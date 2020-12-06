import pandas as pd
import json
import os


class DataCleaner:
    #initate df for storing post-processed data block
    df=pd.DataFrame()

    def process_rawdata(self,dir):

        seqsdf=pd.DataFrame()
        dirname=dir
        directory= os.fsencode(dirname)

        #iterate through every json file
        for f in os.listdir(directory):
            print('file: ', bytes.decode(f))
            file=open(dirname+bytes.decode(f))
            data=json.loads(file.read())
            df=pd.DataFrame(data)


            events = df['events']
            #list of eventnumber to drop later
            eventnum_todrop = []
            #previous game clock
            prevgameclk = 0.0

            #remove invalid events
            for eventnum in range(0, len(events)):
                # get all moments in this event
                moments = events[eventnum]["moments"]
                # remove event with too few game moments
                if (len(moments) <= 25):
                    eventnum_todrop.append(eventnum)
                    continue
                # remove event with same starting game clock as the previous event(duplicate event)

                elif (moments[2] == prevgameclk):
                    eventnum_todrop.append(eventnum)
                    continue
                else:
                    #update starting game clock
                    prevgameclk = moments[2]

            file.close()

            df = df.drop(eventnum_todrop)
            df = df.reset_index(drop=True)


            seqsdf=seqsdf.append(df,ignore_index=True)

            print('total number of raw sequences:',len(seqsdf))
            #dump all events into seqsdf
            return seqsdf

            #seqsdf.to_json(dirname+'rawsequences.json')


