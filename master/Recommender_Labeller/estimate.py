import warnings
with warnings.catch_warnings():
    warnings.filterwarnings("ignore", category=DeprecationWarning)
    import tensorflow as tf
import numpy as np
import pickle
import matplotlib.pyplot as plt
#from Data_Preprocessing import draw
import heapq
import sys, os
sys.path.append(os.path.join(os.path.dirname(sys.path[0]),'play2vec'))
sys.path.append(".")
#from drawgif import animationdrawer
from dae import extract_character_vocab, mapping_source_int
#from utils import corrupt_noise, corrupt_drop

np.random.seed(123)
tf.set_random_seed(123)


def pad_sentence_batch(sentence_batch, pad_int):
    '''
    batch completion，guarantee the same sequence_length
    
    parameters：
    - sentence batch
    - pad_int: <PAD> respond to index
    '''
    max_sentence = max([len(sentence) for sentence in sentence_batch])
    return [sentence + [pad_int] * (max_sentence - len(sentence)) for sentence in sentence_batch]

def get_batches(sources, batch_size, source_pad_int, embed_mat):
    for batch_i in range(0, len(sources)//batch_size):
        start_i = batch_i * batch_size
        sources_batch = sources[start_i:start_i + batch_size]
        # complete sequence
        pad_sources_batch = np.array(pad_sentence_batch(sources_batch, source_pad_int))
        
        source_lengths = []
        for source in sources_batch:
            source_lengths.append(len(source))
        
        embed_batch = np.array([[embed_mat[i] for i in psb] for psb in pad_sources_batch])
        
        yield embed_batch, pad_sources_batch, source_lengths
        
def get_result(train_source, embed_mat, source_letter_to_int, path1):
    # Batch Size
    batch_size = len(train_source)
    checkpoint = path1 + "model_1/trained_model.ckpt" 
    
    with tf.Session() as sess:
        # load model
        new_saver = tf.train.import_meta_graph(checkpoint + '.meta')
        new_saver.restore(sess, tf.train.latest_checkpoint(path1 + "model_1"))#
        graphtf = tf.get_default_graph()
        
        embed_seq = graphtf.get_tensor_by_name('embed_seq:0')
        input_data = graphtf.get_tensor_by_name('inputs:0')
        source_sequence_length = graphtf.get_tensor_by_name('source_sequence_length:0')
        
        encoder_state = graphtf.get_tensor_by_name('rnn/while/Exit_5:0')

        for batch_i, (embed_batch, sources_batch, sources_lengths) in enumerate(get_batches(train_source, batch_size, source_letter_to_int['<PAD>'], embed_mat)):
            return sess.run([encoder_state],
                        {embed_seq: embed_batch,
                        input_data: sources_batch,
                        source_sequence_length: sources_lengths})
        
        
def model_preprocess(embed_mat, UNIQUE_WORDS, data):
    embed_mat = np.r_[embed_mat,np.random.rand(len(embed_mat[0])).reshape(1,-1)]
    embed_mat = np.r_[embed_mat,np.random.rand(len(embed_mat[0])).reshape(1,-1)]
    embed_mat = np.r_[embed_mat,np.random.rand(len(embed_mat[0])).reshape(1,-1)]
    embed_mat = np.r_[embed_mat,np.random.rand(len(embed_mat[0])).reshape(1,-1)]
    source_int_to_letter, source_letter_to_int = extract_character_vocab(data, UNIQUE_WORDS)
    source_int = []
    source_int = mapping_source_int(data, UNIQUE_WORDS)
    return embed_mat, source_int_to_letter, source_letter_to_int, source_int

def get_seq(a):
    temp = []
    for d in a:
        temp.append(d[0])
    return temp

def search(represent, query_index, train_key, topk):
    q_vec = represent[train_key.index(query_index)]
    temp = []
    for i in range(len(represent)):
        if i == train_key.index(query_index):
            continue
        temp.append((i, np.sqrt(np.sum(np.square(represent[i] - q_vec)))))
    res = get_seq(heapq.nsmallest(topk, temp, key=lambda x:x[1]))

    return [train_key[r] for r in res]

def searchTactic(represent, query_index, train_key, topk):
    q_vec = represent[train_key.index(query_index)]
    temp = []
    for i in range(len(represent)):
        if i == train_key.index(query_index) or ((i+1) not in [5000,2000,1,7,100,10,11,2,3,5,
                                                               60,200,2100,90,233,367,971,
                                                               2800,1500,1700]):
            continue
        else:
            temp.append((i, np.sqrt(np.sum(np.square(represent[i] - q_vec)))))

    res = get_seq(heapq.nsmallest(topk, temp, key=lambda x: x[1]))
    return [train_key[r] for r in res]



def gettop5(query_index, gettactic, path1=r'V:/Dejaplay/master/Recommender_Labeller/TrainedData/'):
    #print('autoencoder')
    query_index=('sequence_'+str(query_index)).encode(encoding='utf-8')
    #small_data = pickle.load(open(path1+'small_data.pkl', 'rb'), encoding='bytes')
    #noise_data = pickle.load(open(path1+'noise_data', 'rb'), encoding='bytes')
    #cor_ogm_train_data = ogm_train_data=pickle.load(open(path1+'noise_ogm_train_data', 'rb'), encoding='bytes') #for noise version
    ogm_train_data = pickle.load(open(path1+'ogm_train_data', 'rb'), encoding='bytes')
    ogm_train_key = pickle.load(open(path1+'ogm_train_key', 'rb'), encoding='bytes')
    #testing
    """draw_data = {}
    draw_data.update(small_data.items()) 
    draw_data.update({k+b'noise':v for k,v in noise_data.items()}.items())"""
    train_key = ogm_train_key #+ [i + b'noise' for i in ogm_train_key]
    estimate = ogm_train_data #+ cor_ogm_train_data

    embed_mat = pickle.load(open(path1+'embed_mat', 'rb'), encoding='bytes')
    UNIQUE_WORDS = pickle.load(open(path1+'corpus', 'rb'), encoding='bytes')

    embed_mat, source_int_to_letter, source_letter_to_int, source_int = model_preprocess(embed_mat, UNIQUE_WORDS, estimate)
    #source_int = pickle.dump(source_int, open(path1+'source_int', 'wb'), protocol=2)
    #source_int = pickle.load(open(path1+'source_int', 'rb'), encoding='bytes')
    represent = get_result(source_int, embed_mat, source_letter_to_int, path1)[0]
    #query_index = get_index()
    #query_index = b'sequence_2'
    print('query:', query_index)
    #draw(seq=query_index, data = draw_data)
    if gettactic:
        res = searchTactic(represent, query_index, train_key, topk = 5)
    else:
        res = search(represent, query_index, train_key, topk = 5)
    #draw sequence gif
    stridx=[byteidx.decode(encoding='utf-8')[9:] for byteidx in res]
    #print(stridx)
    return stridx