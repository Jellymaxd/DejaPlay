<?php

//echo "<script type='text/javascript'>alert('displaying');</script>";

class PlayDisplayer{



    public function displaysingle($seq_id){


        require_once("sendrequest.php");
        $rg=new ResponseGetter();
        $playinfo=$rg->requestSingleseq($seq_id);
        $seqid=$playinfo['seq_id'];
        $date=$playinfo['matchdate'];
        $g_clock=$playinfo['gameclock'];
        $s_clock=$playinfo['shotclock'];
        $h_team=$playinfo['hometeam'];
        $a_team=$playinfo['awayteam'];
        $quarter=$playinfo['quarter'];

        $clocks=$this->timeformatter($g_clock, $s_clock);
        $g_clock=$clocks[0];
        $s_clock=$clocks[1];
        
        echo "<div class='media-image-body'>";
                  echo  "<h2>".$h_team.' vs '.$a_team."</h2>";
                  echo  "<h2>".$date."</h2>";
                  echo  "<p>Quarter ".$quarter."</p>";
                  echo  "<p>".'Game clock: '.$g_clock."<p>";
                  echo  "<p>".'Shot Clock: '.$s_clock."</p>";
                     echo '<div class="btn-grp">';
                     echo '<p><a href="similarplays.php?seq_id='.$seq_id.'" class="btn btn-outline-primary py-2 px-4"><span class="caption">Find similar plays</span></a></p>';
                     echo '<p><a href="playtactics.php?seq_id='.$seqid.'" class="btn btn-outline-primary py-2 px-4"><span class="caption">Find set plays used</span></a></p>';
                   echo '</div>';              
                echo '</div>';           

       // $this->display_generaldiv($playinfo);
    
    
    }
    public function display_mainplay($seq_id, $pathmod=''){
 
                require_once("sendrequest.php");
                $rg=new ResponseGetter();
                $mainplayinfo=$rg->requestSingleseq($seq_id);
               //display main play
               $m_seqid=$mainplayinfo['seq_id'];
               $m_date=$mainplayinfo['matchdate'];
               $m_g_clock=$mainplayinfo['gameclock'];
               $m_s_clock=$mainplayinfo['shotclock'];
               $m_h_team=$mainplayinfo['hometeam'];
               $m_a_team=$mainplayinfo['awayteam'];
               $m_quarter=$mainplayinfo['quarter'];
       
               $clocks=$this->timeformatter($m_g_clock, $m_s_clock);
               $m_g_clock=$clocks[0];
               $m_s_clock=$clocks[1];

               echo "<div id='main-play-gif' class='site-blocks-cover inner-page' style='background-image: url(images/".$pathmod."Event_".$seq_id.".gif);' data-aos='fade' data-stellar-background-ratio='0.5'>";
               echo "<div class='row align-items-center justify-content-center'>";
               echo  "<div class='col-md-7 text-center' data-aos='fade'>";
                   echo "</div>";
               echo "</div>";
               echo "</div>"; 
               echo "<div class='mainplaydiv'>";
               echo "<br>";
               echo "<br>";
               echo "<h2 style='color:black'>";
               echo "Game Details:";
               echo "</h2>";
                   echo "<h3>".$m_h_team." vs ".$m_a_team."  ".$m_date."</h3>";
                   echo "<br>";
                           echo "<p>Quater ".$m_quarter."</p>";
                           echo "<p>Game clock: ".$m_g_clock."<p>";
                           echo "<p>Shot Clock: ".$m_s_clock."</p>";
       
       
               echo "</div>";
            }

    public function displaysimilars($seq_id, $simplayinfo){

           //display similar plays one by one
               $divnum=1;

               foreach ($simplayinfo as $key=>$playinfo){
       
                   $seqid=$playinfo['seq_id'];
                   $date=$playinfo['matchdate'];
                   $g_clock=$playinfo['gameclock'];
                   $s_clock=$playinfo['shotclock'];
                   $h_team=$playinfo['hometeam'];
                   $a_team=$playinfo['awayteam'];
                   $quarter=$playinfo['quarter'];
                   $clocks=$this->timeformatter($g_clock, $s_clock);
                   $g_clock=$clocks[0];
                   $s_clock=$clocks[1];
       
                   //div num is odd
       
                   if ($divnum % 2 ==1){
       
                       echo '<div id="simplaydiv-'.$divnum.'" class="site-section border-bottom" name="'.$seqid.'" style="background-color:white">
                       <div class="container">
                       <div class="row">
                           <div class="col-lg-6">
                           <div id="loader'.$divnum.'" class="loader">
                           <p class="mb-5" >'.'<img id="play-gif-odd-'.$seqid.'" src="images/loadingpic.gif" alt="Image" class="img-fluid rounded"><div class="loadingdiv"><p id="loadtxt'.$divnum.'" class="loadingtxt">Plotting Animated Play...</p></div></p>
                           </div>
                           </div>
                           <div class="col-lg-5 ml-auto">
                           <h2 class="site-section-heading mb-3" style="color:black">Similar Play '.$divnum.'</h2>
                           <h3>'.$h_team.' vs '.$a_team.'</h3>
                           <br>
                           <h3>'.$date.'</h3>
                           <p>Quater '.$quarter.'</p>
                           <p>Game clock: '.$g_clock.'<p>
                           <p>Shot Clock: '.$s_clock.'</p>
                           <p class="mb-4"></p>
                           <p><a href="playtactics.php?from=1&seq_id='.$seqid.'" class="btn btn-outline-primary py-2 px-4">Find tactics used</a></p>
                           </div>
                           </div>
                           </div>
                       </div>';
       
                   }
       
       
                   //div num is even
                   else{
       
                       echo '<div id="simplaydiv-'.$divnum.'" class="site-section border-bottom" name="'.$seqid.'"style="background-color:white">
                       <div class="container">
                       <div class="row">
                           <div class="col-lg-6 order-1 order-lg-2">
                           <div id="loader'.$divnum.'" class="loader">
                           <p class="mb-5" >'.'<img id="play-gif-even-'.$seqid.'" src="images/loadingpic.gif" alt="Image" class="img-fluid rounded"><div class="loadingdiv"><p id="loadtxt'.$divnum.'" class="loadingtxt">Plotting Animated Play...</p></div></p>
                           </div>
                           </div>
                           <div class="col-lg-5 mr-auto order-2 order-lg-1">
                           <h2 class="site-section-heading mb-3" style="color:black">Similar Play '.$divnum.'</h2>
                           <h3>'.$h_team.' vs '.$a_team.'</h3>
                           <br>
                           <h3>'.$date.'</h3>
                           <p>Quater '.$quarter.'</p>
                           <p>Game clock: '.$g_clock.'<p>
                           <p>Shot Clock: '.$s_clock.'</p>
                           <p class="mb-4"></p>
                           <p><a href="playtactics.php?from=1&seq_id="'.$seqid.' class="btn btn-outline-primary py-2 px-4">Find Tactics Used</a></p>
                           </div>
                           </div>
                           </div>
                       </div>';
                   }
       
               $divnum=$divnum+1;
               }
       //$this->display_similardiv($simiplaysinfo, $mainplayinfo);
    }   

    static function timeformatter($gameclock, $shotclock){
        $gclock_min=floor($gameclock/60);
        $gclock_sec=round(($gameclock/60-$gclock_min)*60);
        $gameclock = $gclock_min.':'.$gclock_sec;
        
        if ($shotclock==NULL){
            $sclock='not available';
        }

        else{
            $sclock=$shotclock.'s';
        }

        return array($gameclock, $sclock);
    }
}

//$pd=new PlayDisplayer();
//$pd->displaysingle(2);

?>