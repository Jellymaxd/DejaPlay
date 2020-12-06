<!DOCTYPE html>
<html lang="en">

<?php

//if have previous session, destroy it
session_start();
if (session_status() != PHP_SESSION_NONE){
  session_destroy();}
  
//initiate playerdisplayer
include 'playdisplayer.php';
$pd=new PlayDisplayer();

//delete temp files in seq upon reload  
include 'deletefiles.php';
$fm=new FileManager();
$fm->deleteseq();
?>

  <head>
    <title>DejaPlay &mdash; Find Similar NBA Plays</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Amatic+SC:400,700|Work+Sans:300,400,700" rel="stylesheet">
    <link rel="stylesheet" href="fonts/icomoon/style.css">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/owl.theme.default.min.css">
    <link rel="stylesheet" href="css/bootstrap-datepicker.css">
    <link rel="stylesheet" href="css/animate.css">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/mediaelement@4.2.7/build/mediaelementplayer.min.css">
    
    
    
    <link rel="stylesheet" href="fonts/flaticon/font/flaticon.css">
  
    <link rel="stylesheet" href="css/aos.css">

    <link rel="stylesheet" href="css/style.css">
    
  </head>
  <body style="background-image: url('images/jimmybutler.jpg');">
  
  <div class="site-wrap-home">

    

    <div class="site-mobile-menu">
      <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
          <span class="icon-close2 js-menu-toggle"></span>
        </div>
      </div>
      <div class="site-mobile-menu-body"></div>
    </div> <!-- .site-mobile-menu -->
    
    
    <div class="site-navbar-wrap js-site-navbar bg-white">
      
      <div class="container">
        <div class="site-navbar bg-light">
          <div class="py-1">
            <div class="row align-items-center">
              <div class="col-2">
                <h2 class="mb-0 site-logo"><a href="index.html">Deja<strong>Play</strong></a></h2>
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">

                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <!-- <div style="height: 113px;"></div> -->
    <div class="slide-one-item home-slider owl-carousel">
      
      <div class="site-blocks-cover inner-page" style="background-image: url(images/knicks.jpg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <!-- <div class="container"> -->
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h1>Welcome To DejaPlay</h1>
              <span class="caption d-block text-white">advanced similar play retrieval</span>
            </div>
          </div>
        <!-- </div> -->
      </div>  

      <div class="site-blocks-cover inner-page" style="background-image: url(images/napier.jpeg);" data-aos="fade" data-stellar-background-ratio="0.5">
        <!-- <div class="container"> -->
          <div class="row align-items-center justify-content-center">
            <div class="col-md-7 text-center" data-aos="fade">
              <h1>Find Similar NBA plays</h1>
              <span class="caption d-block text-white">with tactic labels</span>
            </div>
          </div>
        <!-- </div> -->
      </div> 
    </div>



    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="site-section-heading text-center" style="color:black">Example set plays</h2>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12 block-13 nav-direction-white">
            <div class="nonloop-block-13 owl-carousel">

              <div class="media-image">
                <img src="images/Event_1000.gif" alt="sample play" class="img-fluid">
                <div class='media-image-body'>
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
                <img src="images/Event_100.gif" alt="Image" class="img-fluid">
                <div class='media-image-body'>
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
                <img src="images/Event_2.gif" alt="Image" class="img-fluid">
                <div class='media-image-body'>
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
                <img src="images/Event_2000.gif" alt="Image" class="img-fluid">
                <div class='media-image-body'>
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
                <img src="images/Event_3000.gif" alt="Image" class="img-fluid">
                <div class='media-image-body'>
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
                <img src="images/Event_5000.gif" alt="Image" class="img-fluid">
                <div class='media-image-body'>
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
          </div>
        </div>
      </div>
    </div>

    <div class="site-section bg-image" style="background-image: url('images/nba_bg3.jpg'); background-attachment: fixed">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <p class="mb-5"><img src="images/Event_2.gif" alt="sample play" class="img-fluid" width="700px" height="auto"></p>
          </div>
          <div class="col-lg-5 ml-auto">
            <h2 class="site-section-heading mb-3"></h2>
            <p style="color:white;">Ever find a interesting play or want to learn more about the strategies used in the play? Try to look for plays-alike from this/other games that run similar set play strategies </p>
            <p class="mb-4" style="color:white;">We will retrieve the top five plays that are most similar to your selections using our advanced similar play retrieval algorithm.</p>
            <p><!--a id="findfilters" href="#filters" class="btn btn-outline-primary py-2 px-4" ></a--></p>
           
            <?php




             
            ?>
          </div>
        </div>
      </div>
    </div>

    <!--div class="site-section" id="filters">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <h2 class="site-section-heading text-center" style="color:black">Search plays by filter</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-4 text-center mb-4">
            <div class="border p-4 text-with-icon">
              <span class="display-4 mb-4 d-block text-primary">
              <img width="50" height="50" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik00NTIsNDBoLTI0VjBoLTQwdjQwSDEyNFYwSDg0djQwSDYwQzI2LjkxNiw0MCwwLDY2LjkxNiwwLDEwMHYzNTJjMCwzMy4wODQsMjYuOTE2LDYwLDYwLDYwaDM5Mg0KCQkJYzMzLjA4NCwwLDYwLTI2LjkxNiw2MC02MFYxMDBDNTEyLDY2LjkxNiw0ODUuMDg0LDQwLDQ1Miw0MHogTTQ3Miw0NTJjMCwxMS4wMjgtOC45NzIsMjAtMjAsMjBINjBjLTExLjAyOCwwLTIwLTguOTcyLTIwLTIwVjE4OA0KCQkJaDQzMlY0NTJ6IE00NzIsMTQ4SDQwdi00OGMwLTExLjAyOCw4Ljk3Mi0yMCwyMC0yMGgyNHY0MGg0MFY4MGgyNjR2NDBoNDBWODBoMjRjMTEuMDI4LDAsMjAsOC45NzIsMjAsMjBWMTQ4eiIvPg0KCTwvZz4NCjwvZz4NCjxnPg0KCTxnPg0KCQk8cmVjdCB4PSI3NiIgeT0iMjMwIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiLz4NCgk8L2c+DQo8L2c+DQo8Zz4NCgk8Zz4NCgkJPHJlY3QgeD0iMTU2IiB5PSIyMzAiIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIvPg0KCTwvZz4NCjwvZz4NCjxnPg0KCTxnPg0KCQk8cmVjdCB4PSIyMzYiIHk9IjIzMCIgd2lkdGg9IjQwIiBoZWlnaHQ9IjQwIi8+DQoJPC9nPg0KPC9nPg0KPGc+DQoJPGc+DQoJCTxyZWN0IHg9IjMxNiIgeT0iMjMwIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiLz4NCgk8L2c+DQo8L2c+DQo8Zz4NCgk8Zz4NCgkJPHJlY3QgeD0iMzk2IiB5PSIyMzAiIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIvPg0KCTwvZz4NCjwvZz4NCjxnPg0KCTxnPg0KCQk8cmVjdCB4PSI3NiIgeT0iMzEwIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiLz4NCgk8L2c+DQo8L2c+DQo8Zz4NCgk8Zz4NCgkJPHJlY3QgeD0iMTU2IiB5PSIzMTAiIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIvPg0KCTwvZz4NCjwvZz4NCjxnPg0KCTxnPg0KCQk8cmVjdCB4PSIyMzYiIHk9IjMxMCIgd2lkdGg9IjQwIiBoZWlnaHQ9IjQwIi8+DQoJPC9nPg0KPC9nPg0KPGc+DQoJPGc+DQoJCTxyZWN0IHg9IjMxNiIgeT0iMzEwIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiLz4NCgk8L2c+DQo8L2c+DQo8Zz4NCgk8Zz4NCgkJPHJlY3QgeD0iNzYiIHk9IjM5MCIgd2lkdGg9IjQwIiBoZWlnaHQ9IjQwIi8+DQoJPC9nPg0KPC9nPg0KPGc+DQoJPGc+DQoJCTxyZWN0IHg9IjE1NiIgeT0iMzkwIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiLz4NCgk8L2c+DQo8L2c+DQo8Zz4NCgk8Zz4NCgkJPHJlY3QgeD0iMjM2IiB5PSIzOTAiIHdpZHRoPSI0MCIgaGVpZ2h0PSI0MCIvPg0KCTwvZz4NCjwvZz4NCjxnPg0KCTxnPg0KCQk8cmVjdCB4PSIzMTYiIHk9IjM5MCIgd2lkdGg9IjQwIiBoZWlnaHQ9IjQwIi8+DQoJPC9nPg0KPC9nPg0KPGc+DQoJPGc+DQoJCTxyZWN0IHg9IjM5NiIgeT0iMzEwIiB3aWR0aD0iNDAiIGhlaWdodD0iNDAiLz4NCgk8L2c+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8L3N2Zz4NCg==" /></span>
              <h2 class="h5">By date</h2>
              <form id="datefilter" action=>
                <label for="dname"></label>
                <input type="text" id="dname" name="dname" placeholder="DD-MM-YYYY"><br><br>
                <button type="button" id="datebtn" class="btn btn-primary text-white">confirm</a>
              </form>
            </div>
          </div>
          <div class="col-md-4 text-center mb-4">
            <div class="border p-4 text-with-icon">
              <span class="display-4 mb-4 d-block text-primary">
              <img width=50 height=50 src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0iaXNvLTg4NTktMSI/Pg0KPCEtLSBHZW5lcmF0b3I6IEFkb2JlIElsbHVzdHJhdG9yIDE5LjAuMCwgU1ZHIEV4cG9ydCBQbHVnLUluIC4gU1ZHIFZlcnNpb246IDYuMDAgQnVpbGQgMCkgIC0tPg0KPHN2ZyB2ZXJzaW9uPSIxLjEiIGlkPSJDYXBhXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB2aWV3Qm94PSIwIDAgNTEyIDUxMiIgc3R5bGU9ImVuYWJsZS1iYWNrZ3JvdW5kOm5ldyAwIDAgNTEyIDUxMjsiIHhtbDpzcGFjZT0icHJlc2VydmUiPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik00MzcsMjY4LjE1MmgtNTAuMTE4Yy02LjgyMSwwLTEzLjQyNSwwLjkzMi0xOS43MSwyLjY0NmMtMTIuMzk4LTI0LjM3Mi0zNy43MS00MS4xMTgtNjYuODc3LTQxLjExOGgtODguNTkNCgkJCWMtMjkuMTY3LDAtNTQuNDc5LDE2Ljc0Ni02Ni44NzcsNDEuMTE4Yy02LjI4NS0xLjcxNC0xMi44ODktMi42NDYtMTkuNzEtMi42NDZINzVjLTQxLjM1NSwwLTc1LDMzLjY0NS03NSw3NXY4MC4xMTgNCgkJCWMwLDI0LjgxMywyMC4xODcsNDUsNDUsNDVoNDIyYzI0LjgxMywwLDQ1LTIwLjE4Nyw0NS00NXYtODAuMTE4QzUxMiwzMDEuNzk3LDQ3OC4zNTUsMjY4LjE1Miw0MzcsMjY4LjE1MnogTTEzNi43MDUsMzA0LjY4Mg0KCQkJdjEzMy41ODlINDVjLTguMjcxLDAtMTUtNi43MjktMTUtMTV2LTgwLjExOGMwLTI0LjgxMywyMC4xODctNDUsNDUtNDVoNTAuMTE4YzQuMDcyLDAsOC4wMTUsMC41NTMsMTEuNzY5LDEuNTcyDQoJCQlDMTM2Ljc3OSwzMDEuMzY2LDEzNi43MDUsMzAzLjAxNiwxMzYuNzA1LDMwNC42ODJ6IE0zNDUuMjk1LDQzOC4yNzFoLTE3OC41OVYzMDQuNjgxYzAtMjQuODEzLDIwLjE4Ny00NSw0NS00NWg4OC41OQ0KCQkJYzI0LjgxMywwLDQ1LDIwLjE4Nyw0NSw0NVY0MzguMjcxeiBNNDgyLDQyMy4yNzFjMCw4LjI3MS02LjcyOSwxNS0xNSwxNWgtOTEuNzA1di0xMzMuNTljMC0xLjY2Ny0wLjA3NC0zLjMxNy0wLjE4Mi00Ljk1Nw0KCQkJYzMuNzU0LTEuMDE4LDcuNjk3LTEuNTcyLDExLjc2OS0xLjU3Mkg0MzdjMjQuODEzLDAsNDUsMjAuMTg3LDQ1LDQ1VjQyMy4yNzF6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik0xMDAuMDYsMTI2LjUwNGMtMzYuNzQ5LDAtNjYuNjQ2LDI5Ljg5Ny02Ni42NDYsNjYuNjQ2Yy0wLjAwMSwzNi43NDksMjkuODk3LDY2LjY0Niw2Ni42NDYsNjYuNjQ2DQoJCQljMzYuNzQ4LDAsNjYuNjQ2LTI5Ljg5Nyw2Ni42NDYtNjYuNjQ2QzE2Ni43MDYsMTU2LjQwMSwxMzYuODA5LDEyNi41MDQsMTAwLjA2LDEyNi41MDR6IE0xMDAuMDU5LDIyOS43OTYNCgkJCWMtMjAuMjA3LDAtMzYuNjQ2LTE2LjQzOS0zNi42NDYtMzYuNjQ2YzAtMjAuMjA3LDE2LjQzOS0zNi42NDYsMzYuNjQ2LTM2LjY0NmMyMC4yMDcsMCwzNi42NDYsMTYuNDM5LDM2LjY0NiwzNi42NDYNCgkJCUMxMzYuNzA1LDIxMy4zNTcsMTIwLjI2NiwyMjkuNzk2LDEwMC4wNTksMjI5Ljc5NnoiLz4NCgk8L2c+DQo8L2c+DQo8Zz4NCgk8Zz4NCgkJPHBhdGggZD0iTTI1Niw0My43MjljLTQ5LjA5NiwwLTg5LjAzOCwzOS45NDItODkuMDM4LDg5LjAzOGMwLDQ5LjA5NiwzOS45NDIsODkuMDM4LDg5LjAzOCw4OS4wMzhzODkuMDM4LTM5Ljk0Miw4OS4wMzgtODkuMDM4DQoJCQlDMzQ1LjAzOCw4My42NzIsMzA1LjA5Niw0My43MjksMjU2LDQzLjcyOXogTTI1NiwxOTEuODA1Yy0zMi41NTQsMC01OS4wMzgtMjYuNDg0LTU5LjAzOC01OS4wMzgNCgkJCWMwLTMyLjU1MywyNi40ODQtNTkuMDM4LDU5LjAzOC01OS4wMzhzNTkuMDM4LDI2LjQ4NCw1OS4wMzgsNTkuMDM4QzMxNS4wMzgsMTY1LjMyMSwyODguNTU0LDE5MS44MDUsMjU2LDE5MS44MDV6Ii8+DQoJPC9nPg0KPC9nPg0KPGc+DQoJPGc+DQoJCTxwYXRoIGQ9Ik00MTEuOTQsMTI2LjUwNGMtMzYuNzQ4LDAtNjYuNjQ2LDI5Ljg5Ny02Ni42NDYsNjYuNjQ2YzAuMDAxLDM2Ljc0OSwyOS44OTgsNjYuNjQ2LDY2LjY0Niw2Ni42NDYNCgkJCWMzNi43NDksMCw2Ni42NDYtMjkuODk3LDY2LjY0Ni02Ni42NDZDNDc4LjU4NiwxNTYuNDAxLDQ0OC42ODksMTI2LjUwNCw0MTEuOTQsMTI2LjUwNHogTTQxMS45NCwyMjkuNzk2DQoJCQljLTIwLjIwNiwwLTM2LjY0Ni0xNi40MzktMzYuNjQ2LTM2LjY0NmMwLjAwMS0yMC4yMDcsMTYuNDQtMzYuNjQ2LDM2LjY0Ni0zNi42NDZjMjAuMjA3LDAsMzYuNjQ2LDE2LjQzOSwzNi42NDYsMzYuNjQ2DQoJCQlDNDQ4LjU4NiwyMTMuMzU3LDQzMi4xNDcsMjI5Ljc5Niw0MTEuOTQsMjI5Ljc5NnoiLz4NCgk8L2c+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8Zz4NCjwvZz4NCjxnPg0KPC9nPg0KPGc+DQo8L2c+DQo8L3N2Zz4NCg==" />
              </span>
              <h2 class="h5">By team</h2>
              <form id="teamfilter" action=>
                <label for="tname"></label>
                <input type="text" id="tname" name="tname"><br><br>
                <button type="button" id="teambtn" class="btn btn-primary text-white" >confirm</a>
              </form>
            </div>
          </div>
          <div class="col-md-4 text-center mb-4">
            <div class="border p-4 text-with-icon">
              <span class="display-4 mb-4 d-block text-primary">
              <img width=50 height=50 src="data:image/svg+xml;base64,PHN2ZyBpZD0iQ2FwYV8xIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA1MTIgNTEyIiBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAwIDUxMiA1MTIiIHdpZHRoPSI1MTIiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyI+PGc+PHBhdGggZD0ibTMwNS4yNjEgMjc4LjE3MmMyNy4zODctMTguMTc5IDQ1LjA2NC00Mi4wMzIgNTEuNjc5LTY5LjUxNyAxOS41NDMtNC45IDM0LjA2LTIyLjYxNCAzNC4wNi00My42NTV2LTMwYzAtNzQuNDM5LTYwLjU2MS0xMzUtMTM1LTEzNWgtOTBjLTguMjg0IDAtMTUgNi43MTYtMTUgMTUgMCAxMC40MjIgMS41MjcgMjAuNDk1IDQuMzY3IDMwLjAwNS0yMi4yMjkgMjQuNzY3LTM0LjM2NyA1Ni4zNjUtMzQuMzY3IDg5Ljk5NXYzMGMwIDIxLjA0MiAxNC41MTUgMzguNzU3IDM0LjA2IDQzLjY1NSA2LjYxNSAyNy40ODUgMjQuMjkzIDUxLjMzOCA1MS42NzkgNjkuNTE3IDIyLjc3NSAxNS4xMTcgNDQuNDQzIDIxLjA2NSA0NS4zNTQgMjEuMzExIDEuMjc5LjM0NSAyLjU5My41MTggMy45MDYuNTE4czIuNjI3LS4xNzMgMy45MDYtLjUxOGMuOTEyLS4yNDYgMjIuNTgtNi4xOTMgNDUuMzU2LTIxLjMxMXptLTQ5LjI2MS0yNDguMTcyYzUzLjYwNCAwIDk3Ljk1NCA0MC4zNzEgMTA0LjIzNyA5Mi4zMDgtNC40NzYtMS40OTctOS4yNjMtMi4zMDgtMTQuMjM3LTIuMzA4aC0xNi41MTJjLTEuNjA4LTcuODk4LTQuNDgxLTE1LjUxMS04LjUzMS0yMi41MTEtMi42ODItNC42MzUtNy42My03LjQ4OS0xMi45ODQtNy40ODloLTUxLjk3M2MtMzYuMjE5IDAtNjYuNTI0LTI1LjgwOS03My40OTMtNjB6bS02NC45NDQgNjcuNDUyYy00LjA1NyA3LTYuOTQzIDE0LjYwNC04LjU1NSAyMi41NDhoLTE2LjUwMWMtNC45NzggMC05Ljc2NS44MjUtMTQuMjQ1IDIuMzI0IDIuMDQ0LTE3LjE2MyA4LjIzMy0zMy4zMzYgMTguMDg1LTQ3LjM4OSA1LjkzNCA4LjUwNiAxMy4wODcgMTYuMTAxIDIxLjIxNiAyMi41MTd6bS04LjM1MSA5NS43MzRjLS45MTctNy41MjctNy4zMDgtMTMuMTg2LTE0Ljg5LTEzLjE4NmgtMS44MTVjLTguMjcxIDAtMTUtNi43MjktMTUtMTVzNi43MjktMTUgMTUtMTVoMzBjOC4yODQgMCAxNS02LjcxNiAxNS0xNSAwLTcuOTk5IDIuMDk1LTE1LjcyMyA2LjAxOC0yMi41MDIgMTIuMDU4IDQuODM5IDI1LjIxNCA3LjUwMiAzOC45ODIgNy41MDJoNDIuNDM3YzEuNjg4IDQuNzg5IDIuNTYzIDkuODY1IDIuNTYzIDE1IDAgOC4yODQgNi43MTYgMTUgMTUgMTVoMzBjOC4yNzEgMCAxNSA2LjcyOSAxNSAxNXMtNi43MjkgMTUtMTUgMTVoLTEuODE0Yy03LjU4MyAwLTEzLjk3MyA1LjY1OS0xNC44OSAxMy4xODYtNi4wMjEgNDkuNDMyLTU4LjQzMyA3MC45NC03My4yOTMgNzYuMDc1LTE0LjkwNy01LjE1My02Ny4yNzktMjYuNjY0LTczLjI5OC03Ni4wNzV6Ii8+PHBhdGggZD0ibTMxNiAzMDBoLTEyMGMtNTcuODk3IDAtMTA1IDQ3LjEwMy0xMDUgMTA1djkyYzAgOC4yODQgNi43MTYgMTUgMTUgMTVoMzAwYzguMjg0IDAgMTUtNi43MTYgMTUtMTV2LTkyYzAtNTcuODk3LTQ3LjEwMy0xMDUtMTA1LTEwNXptLTEyMCAzMGgxMjBjMzguMzEgMCA2OS45ODMgMjguODggNzQuNDQyIDY2LjAwOWwtNTEuMTUgMjUuNTc1Yy01LjA4MiAyLjU0MS04LjI5MiA3LjczNC04LjI5MiAxMy40MTZ2NDdoLTE1MHYtNDdjMC01LjY4Mi0zLjIxLTEwLjg3NS04LjI5Mi0xMy40MTdsLTUxLjE1LTI1LjU3NWM0LjQ1OS0zNy4xMjggMzYuMTMyLTY2LjAwOCA3NC40NDItNjYuMDA4em0tNzUgOTkuMjcxIDMwIDE1djM3LjcyOWgtMzB6bTI0MCA1Mi43Mjl2LTM3LjcyOWwzMC0xNXY1Mi43Mjl6Ii8+PHBhdGggZD0ibTIyNiAzOTBoMzMuNTA3bC0zMS4zNyA1Mi4yODJjLTQuMjYyIDcuMTA0LTEuOTU5IDE2LjMxOCA1LjE0NSAyMC41OCAyLjQxNiAxLjQ1IDUuMDc2IDIuMTQgNy43MDMgMi4xNCA1LjA5NSAwIDEwLjA2NC0yLjU5NyAxMi44NzYtNy4yODVsNDUtNzVjMi43OC00LjYzNCAyLjg1NC0xMC40MDUuMTkxLTE1LjEwOHMtNy42NDgtNy42MDktMTMuMDUyLTcuNjA5aC02MGMtOC4yODQgMC0xNSA2LjcxNi0xNSAxNXM2LjcxNiAxNSAxNSAxNXoiLz48L2c+PC9zdmc+" /></span>
              <h2 class="h5">By player</h2>
              <form id="playerfilter" action=>
                <label for="pname"></label>
                <input type="text" id="pname" name="pname" ><br><br>
                <button type="button" id="playerbtn" class="btn btn-primary text-white" >confirm</a>
              </form>
            </div>
          </div>


        </div>
      </div>
    </div-->


    <!--div class="site-section bg-image" style="background-image: url('images/ki.jpeg'); background-attachment: fixed" id="singleplaysection">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md-12">
            <h2 class="site-section-heading text-center text-white"></h2>
          </div>
        </div>
      </div>  
    </div-->
    




    <footer class="site-footer">
      <div class="container">
        

        <div class="row">
          <div class="col-md-4">
            <h3 class="footer-heading mb-4 text-white">About</h3>
            <p>Dejeplay is a website dedicated to recommendation of basketball plays and prediction of labels.</p>
          </div>
          <div class="col-md-5 ml-auto">
            <div class="row">
              <div class="col-md-6">
                <h3 class="footer-heading mb-4 text-white">Quick Menu</h3>
                  <ul class="list-unstyled">
                    <li><a href="index.php">Home</a></li>
                  </ul>
              </div>
            </div>
          </div>

          
        </div>
        <div class="row pt-5 mt-5 text-center">
          <div class="col-md-12">
            <p> 
            </p>
          </div>
          
        </div>
      </div>
    </footer>
  </div>

  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/jquery-migrate-3.0.1.min.js"></script>
  <script src="js/jquery-ui.js"></script>
  <script src="js/popper.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/jquery.stellar.min.js"></script>
  <script src="js/jquery.countdown.min.js"></script>
  <script src="js/jquery.magnific-popup.min.js"></script>
  <script src="js/bootstrap-datepicker.min.js"></script>
  <script src="js/aos.js"></script>

  <script src="js/main.js"></script>

  </body>
</html>