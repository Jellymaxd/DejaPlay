import pandas as pd
from pymongo import MongoClient
import dns
import json


path1='V:/SportsVU/rawsequences.json'

class mongo:

    def connect(self):
        print('connecting to mongo...')
        # Connect to MongoDB
        try:
            self.client = MongoClient(
                "mongodb+srv://GMAXD:Gxddfe97!@cluster0.rfby0.mongodb.net/dejaplaydb?retryWrites=true&w=majority")
            self.db=self.client['dejaplaydb']
            self.collection=self.db['nbasequences']

        except Exception as e:
            print('Exception', e)
            return -1


        print('connected to db...')
        return self.collection.count_documents({})


    def inserttodb(self, path):
        with open(path) as f:
            data = json.loads(f.read())
            f.close()
        data = pd.DataFrame(data)

        try:
            data.reset_index(inplace=True)
            data_dict = data.to_dict("records")
            # Insert collection
            print("inserting records...")
            self.client['dejaplaydb']['nbasequences'].insert_many(data_dict)

            print('records inserted to collection')

        except Exception as e:
            print('Exception ',e)

    def findseq_byid(self,seq_id, detaildflag):

        try:
            seq=self.collection.find_one({'index': str(seq_id - 1)})
            print('record found...')
        except Exception as e:
            print('Exception ', e)

        if (detaildflag == 1):
            hometeam = seq['events']['home']['name']
            awayteam = seq['events']['visitor']['name']
            gameclock =  seq['events']['moments'][0][2]
            shotclock = seq['events']['moments'][0][3]
            date = seq['gamedate']
            quarter = seq['events']['moments'][0][0]

            return({'seq_id': seq_id, 'hometeam':hometeam, 'awayteam': awayteam, 'gameclock':gameclock, 'shotclock':shotclock,
                    'matchdate':date, 'quarter':quarter})
        else:
            return seq

