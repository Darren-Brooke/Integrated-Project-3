<?php

?>
<html>
    <head>
        <!--Link to bootstrap css-->
        <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="css/stylesheet.css"/>
        <link rel="icon"  type="image/png" href="img/favicon.ico">
        
        <script src="https://code.jquery.com/jquery-3.3.1.js"  integrity="sha256-2Kok7MbOyxpgUVvAk/HJ2jigOSYS2auK4Pfzbm7uH60=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src= "js/bootstrap.min.js" type="text/javascript"></script>
        <script src="js/d3v3.min.js" type="text/javascript"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.4.0/Chart.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
        
        <title>Integrated Project 3</title>
    </head>
    
    <body data-spy="scroll" data-target="#myNav" data-offset="100">
  <!----------------------------- NAVIGATION--------------------------->
       <!--Bootraps nav class that fixes it to the top, exapnds the full width of the screen and changes the color to dark-->
       <nav class="navbar fixed-top navbar-expand-lg" id="myNav" role="navigation"> <!--Nav start-->
       <!--Start Container-fluid - Makes sure everything spans the full witdh-->
       <div class="container-fluid">
         
          <!--Navbar Logo--->
            <a href ="index.php"class="navbar-brand" href="#" id="logo">
              <img src="img/weather.jpg" style="display: inline-block;"/>
            </a>
          <!--End of Navbar Logo-->
          
          <!--Title-->      
            <div class ="navbar-header">
              <a href ="#" class ="navbar-brand">VizWiz?</a>
            </div> 
          <!--End of Header--->

              <!-- Creates the toggle button when the width is decreased, and links it to menu items under the div id="collapseElements" -->
            <button type="button" class="navbar-toggler" data-toggle="collapse" aria-expanded="false" arai-controls="collapseElements" data-target="#collapseElements">
                    &#9776;
            </button>   <!--Close Button-->
                  
                  <!------------- Main Nav Menu ------------->
                  <div class ="collapse navbar-collapse" id="collapseElements">
                     <ul class="navbar navbar-nav ml-auto">
                         <li class ="scroll nav-item">
                            <a class="nav-link" href="index.php">Home<span="sr-only"></span></a>
                          </li>
                         <li class="scroll nav-item">
                            <a class="nav-link" href="weather.php">Weather</a>
                          </li>
                          <li class="scroll nav-item">
                            <a class="nav-link" href="earthquake.php">Earthquake Data</a>
                          </li>
                         <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Visualisations
                            </a>
                            <div class="dropdown-menu" aria-labelledby="#navbarDropdown">
                              <a class="dropdown-item" href="dataVis1.php">Crime Data</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="trivaVis.php">Trivia Quiz</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="meteor.php">Meteor</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="socialMediaActivity.php">Social Media Activity</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="AQComp.php">Air Quality</a>
                            </div>
                          </li>
                          <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-center" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              Tutorials
                            </a>
                            <div class="dropdown-menu" aria-labelledby="#navbarDropdown">
                              <a class="dropdown-item" href="tutorialGeoJSON.php">GeoJSON</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="#">Earthquake</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="tutorialWeather.php">Weather</a>
                              <div class="dropdown-divider"></div>
                              <a class="dropdown-item" href="tutorialJavascript.php">JavaScript</a>
                            </div>
                          </li>
                         <li class="nav-item">
                            <a class="nav-link" href="authors.php">Authors</a>
                         </li>
                    </ul><!--Ends main nav items--->
                </div>
            </div>
        </nav>
