<!DOCTYPE html>
<html lang="en">


<?php
  session_start();
  
  $seq_id=(int) ($_GET['seq_id']);
  $from= $_GET['from'];
  if ($from==1)
     {$pathmod='seq/';}
  else 
     {$pathmod='';}
  include 'playdisplayer.php';
  $pd=new PlayDisplayer();

  include 'tacticdisplayer.php';
  $td=new TacticDisplayer();
?>

  <head>
    <title>Playtactics &mdash;</title>
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
  <body style="background-image: url('images/away.jpg');">
  
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
                <h2 class="mb-0 site-logo"><a href="index.php">Deja<strong>Play</strong></a></h2>
                <p class="mb-0 site-logo" style="font family: Sans">Tactics</p>
              </div>
              <div class="col-10">
                <nav class="site-navigation text-right" role="navigation">
                </nav>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  
    <div class="page-top">
      <br>
      <h2 style="font-family:Georgia"> Selected Play </h2>
    </div>



    <div class="page-content" >
      <div class="tac-main" >
        <?php $pd->display_mainplay($seq_id, $pathmod);?>
      </div>;
      <div class ="page-mid" id="tachead"></div>
    </div>

    <div class=loadingdiv id="tacloading" style="background:white"></div>

    <div class="site-section bg-image" id="tacticplaysdiv" name="<?php echo $seq_id?>" style="background-image: url('images/ball_2.jpg'); background-attachment: fixed; background-color:white;">
      <div class="container">
        <div class="row" id="tac1-5">


        </div>
      </div>  
    </div>
      


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