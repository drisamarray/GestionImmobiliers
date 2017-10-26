<!DOCTYPE html>
<html lang="en">
<head>
<title>Location Maison</title>
<meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

 	<link rel="stylesheet" href="assets/bootstrap/css/bootstrap.css" />
  <link rel="stylesheet" href="assets/style.css"/>
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
	<script src="assets/bootstrap/js/bootstrap.js"></script>
  <script src="assets/script.js"></script>



<!-- Owl stylesheet -->
<link rel="stylesheet" href="assets/owl-carousel/owl.carousel.css">
<link rel="stylesheet" href="assets/owl-carousel/owl.theme.css">
<script src="assets/owl-carousel/owl.carousel.js"></script>
<!-- Owl stylesheet -->


<!-- slitslider -->
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/style.css" />
    <link rel="stylesheet" type="text/css" href="assets/slitslider/css/custom.css" />
    <script type="text/javascript" src="assets/slitslider/js/modernizr.custom.79639.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.ba-cond.min.js"></script>
    <script type="text/javascript" src="assets/slitslider/js/jquery.slitslider.js"></script>
<!-- slitslider -->

<!--importer -->
<link rel="stylesheet" type="text/css" href="assets/slider/slider/css/slider.css"/>
<script type="text/javascript" src="assets/slider/slider/js/bootstrap-slider.js"></script>


</head>

<body>
<?php
require_once '/model/dao/MembreDAO.php';
?>

<!-- Header Starts -->
<div class="navbar-wrapper">

        <div class="navbar-inverse" role="navigation">
          <div class="container">
            <div class="navbar-header">


              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>

            </div>


            <!-- Nav Starts -->
            <div class="navbar-collapse  collapse">
              <ul class="nav navbar-nav navbar-right">
               <li class="active"><a href="index.php">Home</a></li>
                <li><a href="?action=pageAbout">À propos</a></li>
                <li><a href="?action=pageAgents">Agents</a></li>
                <li><a href="?action=pageBlog">Blogue</a></li>
                <li><a href="?action=pageContact">Contact</a></li>
                <?php
                     if (ISSET($_SESSION["connected"]))
                         {
                             $dao = new MembreDAO();
                             $membre = $dao->findMembre($_SESSION["connected"]);
                 echo '<li><a href="#">Bienvenu  '.$membre->getIdentifiant().'</a></li>';
               }
     ?>
              </ul>
            </div>
            <!-- #Nav Ends -->

          </div>
        </div>

    </div>
<!-- #Header Starts -->

<div class="container">

<!-- Header Starts -->
<div class="header">
<a href="index.php"><img src="images/logo1.png" alt="Realestate"></a>

              <ul class="pull-right">
                <li><a href="buysalerent.php">Acheter</a></li>
                <li><a href="buysalerent.php">Vendre</a></li>
                <li><a href="buysalerent.php">Louer</a></li>
              </ul>
</div>
<!-- #Header Starts -->
</div>
