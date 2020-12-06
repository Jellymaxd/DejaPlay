<?php
error_reporting(E_ERROR | E_PARSE);
$get_similar= ($_GET['similar']);
$get_gif=($_GET['getgif']);
$get_tac=($_GET['gettactics']);
$get_filter=($_GET['searchfilter']);
//echo "<script type='text/javascript'>alert('received');</script>";
require_once('playdisplayer.php');
require_once('tacticdisplayer.php');
require_once('sendrequest.php');
//require_once('pythonapi.php');


//handle similar plays requests from frontend
if ($get_similar=='true'){

    $seq_id=(int) ($_GET['seq_id']);
    //echo "<script type='text/javascript'>alert('received');</script>";
    $similardata=get_seqdata($seq_id,True);
    $pd=new PlayDisplayer();
    $pd->displaysimilars($seq_id, $similardata);
    //echo var_dump($ids);
    /*$idfile = fopen("serverfile\idfile".$seq_id.".txt", "w") or die("Unable to open file!");
    foreach ($ids as $id)
        {
        fwrite($idfile, $id.PHP_EOL);}
    fclose($idfile);*/


}

//handle animation request from frontend
else if ($get_gif=='true'){

    $gif_id=(int)($_GET['gif_id']);

    //echo "<script type='text/javascript'>alert('gif');</script>";
    $rg=new ResponseGetter();
    $gifstatus=$rg->requestAni($gif_id);
    if ($gifstatus){

        //echo 'finished';
    }

    else{
        //echo 'error in trying to plot';
    }

}

//handle tactic requests from frontend
else if ($get_tac=='true'){

    $seq_id=(int) ($_GET['seq_id']);
    //echo "<script type='text/javascript'>alert('python3');</script>";
    $tactics=get_tacticdata($seq_id);
    $td=new TacticDisplayer();
    $td->displayTacticBlocks($seq_id, $tactics);


}

else if ($get_filter=='true'){
    console.log("exe1");
    echo '<div class="row">
              <div class="col-md-12 block-13 nav-direction-white">
                <div class="nonloop-block-13 owl-carousel">
    
                  <div class="media-image">
                    <div class="media-image-body">
                     <h2>Los Angeles Lakers vs Philadelphia 76ers</h2>
                     <h2>2016-01-01</h2>
                      <p>Quarter 3</p>
                      <p>Game clock: 7:43<p>
                      <p>Shot Clock: 8.3s</p>
                        <div class="btn-grp">
                        <p><a href="similarplays.php?seq_id=1000" class="btn btn-outline-primary py-2 px-4"><span class="caption">Find similar plays</span></a></p>
                        <p><a href="playtactics.php?seq_id=1000" class="btn btn-outline-primary py-2 px-4"><span class="caption">Find tactics used</span></a></p>
                       </div>             
                    </div>         
                  </div>
    
                  <div class="media-image">
                    <div class="media-image-body">
                     <h2>Washington Wizards vs Orlando Magic</h2>
                     <h2>2016-01-01</h2>
                      <p>Quarter 1</p>
                      <p>Game clock: 3:34<p>
                      <p>Shot Clock: 24s</p>
                        <div class="btn-grp">
                        <p><a href="similarplays.php?seq_id=100" class="btn btn-outline-primary py-2 px-4"><span class="caption">Find similar plays</span></a></p>
                        <p><a href="playtactics.php?seq_id=100" class="btn btn-outline-primary py-2 px-4"><span class="caption">Find tactics used</span></a></p>
                       </div>             
                    </div>                      
                  </div>
    
                  <div class="media-image">
                    <div class="media-image-body">
                    <h2>Washington Wizards vs Orlando Magic</h2>
                     <h2>2016-01-01</h2>
                      <p>Quarter 1</p>
                      <p>Game clock: 11:43<p>
                      <p>Shot Clock: not available</p>
                        <div class="btn-grp">
                        <p><a href="similarplays.php?seq_id=2" class="btn btn-outline-primary py-2 px-4"><span class="caption">Find similar plays</span></a></p>
                        <p><a href="playtactics.php?seq_id=2" class="btn btn-outline-primary py-2 px-4"><span class="caption">Find tactics used</span></a></p>
                       </div>             
                    </div>         
                  </div>
    
                  <div class="media-image">
                    <div class="media-image-body">
                     <h2>Indiana Pacers vs Detroit Pistons</h2>
                     <h2>2016-01-01</h2>
                      <p>Quarter 4</p>
                      <p>Game clock: 8:43<p>
                      <p>Shot Clock: 24s</p>
                        <div class="btn-grp">
                        <p><a href="similarplays.php?seq_id=2000" class="btn btn-outline-primary py-2 px-4"><span class="caption">Find similar plays</span></a></p>
                        <p><a href="playtactics.php?seq_id=2000" class="btn btn-outline-primary py-2 px-4"><span class="caption">Find tactics used</span></a></p>
                       </div>             
                    </div>         
                  </div>
    
                  <div class="media-image">
                    <div class="media-image-body">
                     <h2>Utah Jazz vs Memphis Grizzlies</h2>
                     <h2>2016-01-02</h2>
                      <p>Quarter 4</p>
                      <p>Game clock: 11:25<p>
                      <p>Shot Clock: 15.25s</p>
                        <div class="btn-grp">
                        <p><a href="similarplays.php?seq_id=3000" class="btn btn-outline-primary py-2 px-4"><span class="caption">Find similar plays</span></a></p>
                        <p><a href="playtactics.php?seq_id=3000" class="btn btn-outline-primary py-2 px-4"><span class="caption">Find tactics used</span></a></p>
                       </div>             
                    </div>          
                  </div>
    
                  <div class="media-image">
                    <div class="media-image-body">
                     <h2>Philadelphia 76ers vs Minnesota Timberwolves"</h2>
                     <h2>2016-01-04</h2>
                      <p>Quarter 3</p>
                      <p>Game clock: 7:21<p>
                      <p>Shot Clock: 18.25s</p>
                        <div class="btn-grp">
                        <p><a href="similarplays.php?seq_id=5000" class="btn btn-outline-primary py-2 px-4"><span class="caption">Find similar plays</span></a></p>
                        <p><a href="playtactics.php?seq_id=5000" class="btn btn-outline-primary py-2 px-4"><span class="caption">Find tactics used</span></a></p>
                       </div>             
                    </div>         
                  </div>
    
                </div>
              </div>';}

function get_seqdata($seq_id, $findsimilar){
    
    //get similar play info
    if ($findsimilar){

        $similar_data=array();
        $rg=new ResponseGetter();
        $similar_data=$rg->requestSimilarplays($seq_id);
    
        return $similar_data;
    }
    
    //get single play info
    else {          
        return $rg->requestSingleseq($seq_id);
    }

}




function get_tacticdata($seq_id){

    $tacticids=array(
        5000=>'pick and pop',
        2000=>'pick and roll',
        1=>'michigan',
        7=>'drive and kick',
        100=>'give and go',
        10=>'numbered fastbreak',
        11=>'hand off',
        2=>'triangle offense',
        3=>'shuffle',
        5=>'european ball screen',
        60=>'isolation drive',
        200=>'high post pick and roll',
        2100=>'offball pick and roll',
        90=>'one man fastbreak',
        233=>'isolation post up',
        367=>'free throw',
        971=>'fastbreak trailer',
        2800=>'roller backdoor cut',
        1500=>'flare screen',
        1700=>'reverse action');
    
    $tacticExplanation=array(
        5000=>
        'An offensive play in which a player without the ball sets a screen for his teammate with the ball, and then moves or "pops" to an open area on the floor. He then receives a pass and takes an open jump shot.Sporting Charts explains Pick And Pop
        Ideally, for an effective pick and pop, you need a screener (preferably a forward or a center) who is also a terrific perimeter shooter.',
        
        2000=>'An offensive player sets a screen for another offensive player who currently has the ball. This is also known as a ball screen. (The Pick)
        The offensive player dribbles around the ball screen and looks to score.
        The screener, opens up to the ball, and cuts to the basket. (The Roll)',
        
        1=>
        'Soon as Player 1 comes down the court, Player 4 sets a down screen for Player 2 and Player 5 sets a down screen for Player 3. 
        Players 2 & 3 flash to the wings.
        After Players 4 & 5 set a screen, they should try to seal the defender behind them and open up to the ball.
        After Player 1 throws the pass to Player 2, Player 4 sets a cross screen for Player 5 & Player 1 sets an away screen for Player 3.
        Player 5 explodes to the ball side and Player 3 comes to the top of the key.

        You also have the option to have Player 4 post for one or two seconds to see if he can get good post position on his defender before he sets the screen for Player 5. Player 1 would wait to set the screen for Player 3 until Player 4 turns to go set the screen.
        If Player 5 comes across the lane wide open, Player 2 should hit him with the pass. 
        If he is not open, Player 2 should pass the ball to Player 3 at the top of the key.  
        Now, they are in their original formation again and they can continue to run the offense from there.          
        Player 2 sets the screen for Player 5 & Player 1 sets the screen for Player 4.',

        7=>'The "Drive & Kick" offense is essentially a three player weave. Out of a 3-2 spread alignment, it is initiated with dribble penetration to the basket for a lay up shot. If the defense collapses and denies the dribble penetration to the basket, the handler then passes the ball back outside and replaces the receiver. The drive and kick can be a good option to use when running time off the clock prior to running a set play.',
        
        100=>'The "Give & Go" isolation offense basically keeps the ball in the hands and control of your two best ball handlers. Players assume a 2-1-2 spread alignment with the post setting up on the weakside. The Give & Go basket cut is one of the oldest, yet prettiest plays in basketball. If the defender does not take away the passing lane it results in an easy lay up. When the Give & Cut is not available, the passer simply dribbles out and the Give & go basket cut is repeated.',
        
        10=>'1 is the point guard. He handles the ball. He tries to keep the ball out of the middle once he gets to midcourt. That allows the trailer a lane to run and tells them which side to run to. 2 is a shooter and runs the right wing.
        3 is a shooter and runs the left wing.
        4 & 5 are trailers. The first trailer fills the ball-side block by going to the opposite elbow and then angle cuts to the block.
        The second trailer runs in line with the Weakside elbow.',
        
        11=>'A dribble hand off is very similar to a ball screen, and multiple handoffs in the same play can be very hard to guard for the defense, if done right. They are great for relieving ball pressure and getting the ball to a player that may be getting denied. Because they are so similar to ball screens a lot of the same principles apply. The screener must take a good angle and make contact, and the player using the screen needs to first set their defender up and then read the defense.',
        
        2=>'Start the offense in a 1-4 set.The initial action is the ball is entered to the wing. This can be accomplished in a number of ways.
        
        1. A simple pass to the wing. 
        2. dribble down
        3.a handoff
        
        When the ball is entered on the pass, the passer makes a corner cut. This can be accomplished with an inside cut (which could produce a give and go pass for a layup), or an outside cut.
        At the same time, the 5 man sinks to the strongside low post, the 2 man sinks to set up a cutting angle.The 4 man the angles to screen for 2.
        The 2 man cuts to the top off of the screen by 4
        
        This resulting set is the mainframe for the triangle. This alignment can re-occur at any time.
        From this position, the ball can be passed to any player. Each pass would trigger its own, unique set of options.',
        
        3=>'Instead of a conventional numbering of players, the shuffle positions are labeled as O1 (the "first cutter"), O2 (the "point"), O3 (the "feeder"), O4 (the "second cutter") and O5 (the "post"). 
        This is a continuity offense and if run long enough, each of the five players would eventually occupy each of the five shuffle positions.
        
        O1 starts the offense by dribbling the ball up to the wing. 
        O2 makes a V-cut and receives the pass from O1. O2 could shoot the outside shot. 
        Meanwhile O3 fakes inside and cuts hard outside for the pass from O2. 
        At this point, O3 has the options of shooting, driving to the hoop, or looking for the first cutter O1. 
        Meanwhile O5 sets a screen for O1, who makes the Basic Cut, or "shuffle cut" either around the top of the screen, or back-door, and looks for the pass from O3 for the lay-up.',
        
        5=>'1 dribbles down to the right wing to initiate the offense.
            5 sets the screen on the wing, then rolls to the basket.
            1 attacks the ball screen and looks to score.
            If a scoring option is not there off of the initial ball screen, 1 reverses the ball to 4.
        
            As 4 receives the pass, 3 cuts to the basket and clears to the opposite corner. 1 cuts to the opposite wing. 5 cuts to the top.
            After 3 clears, 2 cuts to receive a pass from 4 on the wing.
        
            4 follows the pass and sets a ball screen on the wing.
            2 attacks the ball screen.      
            4 rolls to the basket.
            If no scoring opportunities present themselves, 2 passes to 5.        
            2 fills the opposite wing.          
            4 cuts to the top.
            1 basket cuts and fills the opposite corner.
            Next, 3 would cut to receive the pass. 5 would pass and set the ball screen. And the ball screen offense would continue.',
        
        60=>'Isolation plays are offensive plays designed to create one-on-one game situations. An isolation play\'s goal is to score purely
            based on a player\'s offensive skills or another player\'s lack of defensive skills. In an isolation play, usually the team\'s most
            talented scorer gets the ball, while his teammates spread the floor to give him space',
        
        200=>'1 will start the play in the middle of the court near the half-court division line.

            2, 3, 4 and 5 are in a relatively parallel line (with each other).
            Your bigs are on the lane line extended and the other two players are on opposite corners outside the three-point arc.
            4 initiates the play by lifting up to around the foul line extended.
            5 then cuts above the three-point line to set a high screen-and-roll for 1.
            As 1 dribbles toward 5, 4 pops out to the three-point line.
            When 1 comes off the ball screen, he has options depending on the reaction by the defense.
        
            1. Drive to the basket.
            
            2. Slide the ball to 5 rolling to basket.
            
            3. If the man guarding 4,slides over to help 1 kicks ball out to 4 for a three-point attempt.',

        2100=>
            '4 sets the screen for 1 and then flares to the wing.
            5 cuts across to the low post – forming a post triangle with 1, 2 and 5. 4 can down screen for 3.
            If ball is reversed to 4, 4 must have the ability to shoot, or dribble into the key for a shot or pass.',

        90=>'One man fastbreak occurs when your team gain possession of the basketball and push the ball as quickly as possible up the floor via the dribble or the pass,
        so that there is one teammate in a situation closer to the opponent\'s basket than anyone else. 
        You can gain possession of the ball by a turnover, rebound, blocked shot, or an attempted shot.',

        233=>'Post isolation is a strategy widely use by teams with good post players. The ball handler will feed the ball to the post player in a post up position,
            the other teammates should spread out the floor in the weak side to minimize double team on the post player.
            The post players should take advantage with post plays for a inside score or outlet pass.',

        367=>'A free throw is awarded to a team/player due to
        1. shooting foul
        2. team foul when the team is in bonus situations (opponents have 4 or more fouls commited within one quarter
        3. flagrant foul
        4. technical foul',

        971=>
        '1 looks to pass to 5 trailing the play. 
        4 moves high up the lane line while 3 relocates to the strong-side block. 
        If 5 isn’t open, then that player continues through the lane to the weak side. 
        1 dribbles toward the top and feeds 4 in the high post. 
        4 catches the ball and looks to pass to 5 on the weak side. 
        5 may be open for an alley-oop lob pass or has established post-up position on the defender. 
        5 shoots the layup as 3 boxes out and 4 crashes the glass.',

        2800=>'Once the point guard dribbles toward the player in the corner, that player comes toward the ball then cuts hard to the hoop keeping the defender on his back and looks for the pass from the point,
        Another option is for the point guard to dribble left toward the wing. This signals to the high post to curl around and replace the point guard on the opposite wing.
        The post player relocates to the opposite post and the player in the left corner takes a step or two toward the point guard, then makes a backdoor cut to the hoop.',
        
        1500=>'A Flare Screen is a screen set away from the basketball where the player being screened for instead of cutting to the basket fades out to open space on the perimeter.',

        1700=>'O1 makes an entry pass to wing O3 and executes a guard around cut to the corner. If a shot is not available on the guard around action, the weakside wing O4 then makes a rub cut off O5 to the basket. Off guard O2 moves to center of court for a possible reverse pass from O3.
        If O4 does not receive a pass on the reverse action rub cut or posting up, O3 then makes a reversal pass out to O2. O2 in turn passes to O5 stepping out and executes a guard around cut with O5 to the corner. O1 moves out to the center of the court as O3 rubs off O4\'s screen.    
        The Reverse Action continuity continues when O5 makes a reversal pass out to O1.'
    );

    $rg=new ResponseGetter();
    $tids=$rg->requestTactic($seq_id);
    $tactic_arr=array();

    foreach ($tids as $tid){
        $tacticinfo=array($tacticids[$tid], $tacticExplanation[$tid]);
        array_push($tactic_arr, $tacticinfo);
    }
    return $tactic_arr;

}



?>