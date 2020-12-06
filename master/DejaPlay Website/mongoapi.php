<?php

//echo "<script type='text/javascript'>alert('mongo');</script>";

class DBmanager{

    public function get_seqinfo($seq_id){

        
        $seqinfo=($this->find_sequence($seq_id)->toArray())[0];
        $hometeam = $seqinfo->events->home->name;
        $awayteam = $seqinfo->events->visitor->name;
        $gameclock =($seqinfo->events->moments)[0][2];
        $shotclock =($seqinfo->events->moments)[0][3];
        $date = $seqinfo->gamedate;
        $quarter = ($seqinfo->events->moments)[0][0];
    
        return ['seq_id'=>$seq_id, 'hometeam'=>$hometeam, 
        'awayteam'=>$awayteam, 'gameclock'=>$gameclock, 
        'shotclock'=>$shotclock,
                    'matchdate'=>$date, 'quarter'=>$quarter];

    }


    public function get_simids($seq_id){

        $siminfo=($this->find_simids($seq_id)->toArray())[0];
        $simids=$siminfo->similarids;
        return $simids;
    }


    public function insert_simids($seq_id, $simids){


        try {
            $mongoDbClient = new MongoDB\Driver\Manager('mongodb+srv://GMAXD:Gxddfe97!@cluster0.rfby0.mongodb.net/dejaplaydb?retryWrites=true&w=majority');
        } catch (Exception $error) {
            echo $error->getMessage();
        }

        $idarray=array();
        foreach ($simids as $id){
            array_push($idarray,$id);
        }

        $bulk = new MongoDB\Driver\BulkWrite;
        $bulk->update(['index'=>'s'.$seq_id], ['set'=>['similarids' => $idarray]],['multi' => false, 'upsert' => true]);
        $result=$mongoDbClient->executeBulkWrite('dejaplaydb.nbasequences', $bulk);
        printf("Inserted %d document(s)\n", $result->getInsertedCount());

    }

  


    static function find_simids($seq_id){

        try {
            $mongoDbClient = new MongoDB\Driver\Manager('mongodb+srv://GMAXD:Gxddfe97!@cluster0.rfby0.mongodb.net/dejaplaydb?retryWrites=true&w=majority');
        } catch (Exception $error) {
            echo $error->getMessage();
        }

        //echo('connected');
        $filter= array('index' => 's'.$seq_id);
         $options = array(
            );
        $query = new MongoDB\Driver\Query($filter, $options);
        return  $mongoDbClient->executeQuery('dejaplaydb.nbasequences', $query);   
    }

    static function find_sequence($seq_id){


        try {
            $mongoDbClient = new MongoDB\Driver\Manager('mongodb+srv://GMAXD:Gxddfe97!@cluster0.rfby0.mongodb.net/dejaplaydb?retryWrites=true&w=majority');
        } catch (Exception $error) {
            echo $error->getMessage();
        }

        //echo('connected');
        $filter= array('index' => strval($seq_id-1));
         $options = array(
            );
        $query = new MongoDB\Driver\Query($filter, $options);
        return  $mongoDbClient->executeQuery('dejaplaydb.nbasequences', $query);   



    }


}

?>