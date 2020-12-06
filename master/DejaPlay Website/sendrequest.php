<?php

require_once("mongoapi.php");
class ResponseGetter{

    private $socket;
    

    function __construct() {
        //echo "<h2>TCP/IP Connection</h2>\n";
        $port = 2000;
        $address = '127.0.0.1';

        /* Create a TCP/IP socket. */
        $newsocket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
        
        if ($newsocket === false) {
            echo( "socket_create() failed: reason: " . socket_strerror(socket_last_error()) . "\n");
        } 
        else {
            $this->socket=$newsocket;
            //echo "OK.\n";
        }

        //echo "Attempting to connect to '".$address.' on port'.$port."'...";
        $result = socket_connect($this->socket, $address, $port);
        if ($result === false) {
            echo "socket_connect() failed.\nReason: ($result) " . socket_strerror(socket_last_error($this->socket)) . "\n";
        } else {
            //echo "OK.\n";
        }

    }


    //handling similar play data request
    public function requestSimilarplays($id){
            
        //s for similar plays
        $senddata = 's'.$id;

        //echo "<script type='text/javascript'>alert('sending');</script>";
        //send request through API to get similarplay IDs
        try{
            //echo "Sending HTTP HEAD request...";
            socket_write($this->socket, $senddata, strlen($senddata));
            //echo "OK.\n";

            //echo "Reading response:\n\n";
            $responseStr = socket_read($this->socket, 2048);

            //echo "Closing socket...";
            socket_close($this->socket);}
            //echo "OK.\n\n";}


            catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";}
        


        
        $ids=json_decode($responseStr, true);
        
        //db manager instance to get seq data

        $dbmgr=new DBmanager();
        $similarplay_data=array();

        foreach ($ids as $id){
            array_push($similarplay_data, $dbmgr->get_seqinfo((int)$id));
        }

        return $similarplay_data; 
        

    }




    //handling animation request
    public function requestAni($id){
        
        //p for plotting gif
        $senddata = 'p'.$id;
        
        //echo "<script type='text/javascript'>alert('sending');</script>";
        try{
            //echo "Sending HTTP HEAD request...";
            socket_write($this->socket, $senddata, strlen($senddata));
           // echo "OK.\n";


    
           // echo "Reading response:\n\n";
            $responseStr = socket_read($this->socket, 2048);

            //echo "Closing socket...";
            socket_close($this->socket);
           }


            catch (Exception $e) {
                echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

     
        $result=json_decode($responseStr, true);   

        if ($result=='0'){
            return true;}
        
        return false;
        }


    //handling tactic requestt
    public function requestTactic($id){

        //t for tactics
        $senddata = 't'.$id;

        
        //echo "<script type='text/javascript'>alert('sending');</script>";
        try{
            //echo "Sending HTTP HEAD request...";
            socket_write($this->socket, $senddata, strlen($senddata));
            //echo "OK.\n";


    
           //echo "Reading response:\n\n";
            $responseStr = socket_read($this->socket, 2048);
        
            $linger     = array ('l_linger' => 0, 'l_onoff' => 1);
            socket_set_option($this->socket, SOL_SOCKET, SO_LINGER, $linger);
            //echo "Closing socket...";
            socket_close($this->socket);
            //echo "OK.\n";
        }


            catch (Exception $e) {
                //echo 'Caught exception: ',  $e->getMessage(), "\n";
        }

     
        $result=json_decode($responseStr, true);   


        return $result;


    }

    //handling single sequence request
    public function requestSingleseq($id){

        //DBmanager instance to get single play seq data
        $dbmgr=new DBmanager();
        return $dbmgr->get_seqinfo($id);
    }

}

?>