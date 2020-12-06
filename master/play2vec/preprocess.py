import pickle
import matplotlib.pyplot as plt
import numpy as np

def draw(seq,data):  
    '''
    seq: game clips
    data: datasets
    '''
    plt.figure(figsize=(9.4/2,5.0/2))#10.5,6.8
    plt.xlabel("X-axis")
    plt.ylabel("Y-axis")
    plt.title('Sequence id: '+str(seq).split('_')[1][0:-1] )#+"   Play length: "+str(len(data[seq])*1.0/10)+'s')
    plt.xlim(-47,47)
    plt.ylim(-25,25)
    #img=plt.imread('NBAcourts/.jpg')
    plt.imshow(img, zorder=0, extent=[-47,47,-25,25], aspect='auto')
    defense_x=[0,2,4,6,8]#
    attacking_x=[10,12,14,16,18]#
    ball_x=[20]

    for i in defense_x:
        l1,=plt.plot(data[seq][:,i],data[seq][:,i+1],"b-",linewidth=1)
        plt.scatter(data[seq][-1,i],data[seq][-1,i+1], marker = 'x', color = 'b', s = 100)
    for i in attacking_x:
        l2,=plt.plot(data[seq][:,i],data[seq][:,i+1],"r-",linewidth=1)
        plt.scatter(data[seq][-1,i],data[seq][-1,i+1], marker = 'x', color = 'r', s = 100)
    for i in ball_x:
        l3,=plt.plot(data[seq][:,i],data[seq][:,i+1],"yo",linewidth=1)
    plt.legend(handles = [l1, l2, l3], labels = ['defense','attacking','ball'], loc = 'best')
    plt.show()

    #plt.savefig(str(seq)+'.eps', format='eps', dpi=1000)

def get_trajectory(seq='sequence_1',data=None,role_type='ball',role_num=0):
    '''
    seq: game clips
    data: datasets
    role_type: 'defense' 'attacking' 'ball'
    role_num '0-10' for defense and 'attacking'
    '''
    
    defense_x=[0,2,4,6,8]#
    attacking_x=[10,12,14,16,18]#
    ball_x=[20]

    if role_type=='ball':
        return data[seq][:,[ball_x[0],ball_x[0]+1]]
    if role_type=='defense':
        return data[seq][:,[defense_x[role_num],defense_x[role_num]+1]]
    if role_type=='attacking':
        return data[seq][:,[attacking_x[role_num],attacking_x[role_num]+1]]

if __name__ == '__main__':
    path1=r'TrainedData\\'
    train_data=pickle.load(open(path1+'small_data.pkl', 'rb'), encoding='bytes')
    print(train_data)
    draw(seq=b'sequence_6', data=train_data)

    
    
    