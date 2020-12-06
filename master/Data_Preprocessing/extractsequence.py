import json
import pandas as pd
import numpy as np
import pickle
import datacleaning.DataCleaner as dp
import matplotlib.pyplot as plt

class SequenceExtractor:

    def preprocess_data(self,dir):
        #let dp process rawdata to get rawsequences
        cleaned_data=dp.process_rawdata('/sportsdata/')

    def extract_sequences(self, cleandata):
        #read in raw sport tracking data
        #f=open('V:/SportsVU/rawsequences.json')
        #data = json.loads(f.read())
        data = pd.DataFrame(cleandata)

        #get all raw sequences
        events=data['events']
        print('total num of events:', len(events))
        print('extracting sequence...')

        #dict to store all processed sequences
        sequences={}
        #extract sequences for play2vec
        for eventnum in range(0,len(events)):

            # get all moments in this event
            moments=events[eventnum]["moments"]

            #numpy array to store spatial data(coordinates) for each sequence
            seqspatial=np.empty((1,22))

            #counter for valid moment
            validrecordindex=0

            for freq in range(0,len(moments)):
                #get individual moment
                moment=moments[freq]

                #numpy array to store coordinates of ball and players for each sample
                coords = np.array([])

                #skip sequence with number of positional records other than 11(10 players+1 ball)
                if (len(moment[5])!=11):
                    continue
                else:
                    for pindex in range(1,11):
                        #get x,y of players and ball
                        pxcoor=moment[5][pindex][2]
                        pycoor=moment[5][pindex][3]

                        #reformat player coordinates to be relative to center point
                        pxcoor-=47
                        pycoor-=25
                        #append player coordinates to array
                        coords=np.append(coords, pxcoor)
                        coords=np.append(coords, pycoor)

                # reformat ball coordinates to be relative to center point
                ballxcoor = moment[5][0][2]
                ballycoor = moment[5][0][3]
                ballxcoor -= 47
                ballycoor -= 25
                #append ball coordinates to array
                coords=np.append(coords, ballxcoor)
                coords=np.append(coords, ballycoor)

                #print(coords)
                #add individual records to sequence of records
                seqspatial=np.insert(seqspatial,validrecordindex, coords, axis=0)
                validrecordindex+=1

            sequence=seqspatial[:-1]
            #add individual sequence to sequences
            sequences[str.encode('sequence_' + str(eventnum+1))] = seqspatial
        return sequences

    def dump_seqdata(self,seqs, dir='sportsdata/small_data.pkl'):

        print('zipping to pickle...')
        with open(dir, 'wb') as fout:
            pickle.dump(seqs,fout)

        with open('V:\play2vec-master\play2vec-master\SoccerData\small_data.pkl','wb') as fout2:
            pickle.dump(seqs,fout2)

