import sys, json
import estimate as est
sys.path.append(".")
from drawgif import animationdrawer
from mongoapi import mongo
import base64

ad = animationdrawer()
mymongo = mongo()
# Load the requestStr that PHP sent
try:
    print("received call from php client...")
    requestStr = sys.argv[1]
except Exception as e:
    print("error ocurred", e)
    sys.exit(1)

if (requestStr[0]=='p'):
    print('plotting video')
    print(ad.plotgif(int(requestStr[1:]), '\seq'))

    """try:
        mymongo.connect()
        print(json.dumps(mymongo.findseq_byid(int(requestStr[1:]), 1)))

    except Exception as e:
        print('exception', e)"""


elif (requestStr[0]=='s'):

    try:
        #mymongo.connect()
        print("estimating similar play ids...")
        print(requestStr[1:])
        plotstatus='-1'
        topsimilars = est.gettop5(int(requestStr[1:]),False)
        """
        for i in topsimilars:
            plotstatus=ad.plotgif(int(i),'\seq')
            if (plotstatus!='0'):
                break"""

        print(json.dumps(topsimilars))
    except Exception as e:
        print('exception', e)


elif (requestStr[0]=='t'):
    try:
        #mymongo.connect()
        print("estimating from tactic pool...")
        print(requestStr[1:])
        plotstatus='-1'
        toptactics = est.gettop5(int(requestStr[1:]),True)
        """
        for i in topsimilars:
            plotstatus=ad.plotgif(int(i),'\seq')
            if (plotstatus!='0'):
                break"""

        print(json.dumps(toptactics))

    except Exception as e:
        print('exception', e)

