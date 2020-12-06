import pickle


seq_to_pick=[5000,2000,1,7,100,10,11,2,3,5,60,200,2100,90,233,367,971,2800,1500,1700]
train_sequences={}
train_data=pickle.load(open('/master/Data_Preprocessing/sportsdata/small_data.pkl', 'rb'), encoding='bytes')
for key,value in train_data.items():
    if (int(key.decode(encoding='utf-8')[9:]) in seq_to_pick):
        print(key)
        train_sequences[key]=value
    else:
        continue

with open('V:\play2vec-master\play2vec-master\SoccerData\small_data.pkl','wb') as fout2:
    pickle.dump(train_sequences,fout2)


