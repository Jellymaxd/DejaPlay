<!DOCTYPE html>
<html lang="en">

<?php

session_start();

//id of the clicked play
$seq_id=(int) ($_GET['seq_id']);

include 'playdisplayer.php';
$pd=new PlayDisplayer();

?>

  <head>
    <title>Similar plays  &mdash;</title>
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
    <style>
    .center {
      margin: auto;
      width: 60%;
      padding: 10px;
      text-align: center;}
    </style>
  </head>
  <body style="background-image: url('images/away.jpg'); " id=simbody>
  
  <div class="site-wrap-sim">

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
                <h2 class="mb-0 site-logo"><a href="index.php">Deja<strong>Play</strong></a></h2> 
                <p class="mb-0 site-logo" style="font family: Sans">Similar Plays</p>
                
              </div>
              <div class="col-10">
              
                <nav class="site-navigation text-right" role="navigation">
                  <div class="container">
                    <!--menu
                    <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                    <ul class="site-menu js-clone-nav d-none d-lg-block">
                      <li class="has-children active">
                        <a href="program.html">Program</a>
                        <ul class="dropdown arrow-top">
                          <li><a href="program.html">Body Building</a></li>
                          <li><a href="program.html">Morning Energy</a></li>
                          <li><a href="program.html">Stretching</a></li>
                          <li class="has-children">
                            <a href="program.html">Sub Menus</a>
                            <ul class="dropdown">
                              <li><a href="program.html">Swimming</a></li>
                              <li><a href="program.html">Boxing</a></li>
                              <li><a href="program.html">Running</a></li>
                              <li><a href="program.html">Jogging</a></li>
                              
                            </ul>
                          </li>

                        </ul>
                      </li>
                      <li><a href="trainers.html">Our Trainers</a></li>
                      <li><a href="events.html">News</a></li>
                      <li><a href="about.html">About</a></li>
                      <li><a href="contact.html">Contact</a></li>
                    </ul>
                  </div>-->
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="page-top">
      <br>
      <h2 style="font-family:Georgia"> Original Play</h2>
    </div>

    <?php
    echo '<div class="page-content" id="similarplaysdiv" name="'.$seq_id.'">';
   
      echo '<div class="sim-main" >';
      $pd->display_mainplay($seq_id);
      echo '</div>';

      echo '<div class="sim-plays" id="plays1-5" >';
      echo '</div>';
    
      echo '</div>';
    ?>
   


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