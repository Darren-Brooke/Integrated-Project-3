<?php

include("header.php");

?>

<div class="container-fluid" style="padding-left: 0; padding-right: 0;">
    <div class="row">
        <div class="col-12">
            <div class="container">
                <h2 class="text-center">Weather Page Introduction</h2>
                <p>The Weather Page is a place where you can recieve various weather data from an open api, based on their city location or by Latitude and Longitude.
                The forecast returned will show you both the current forecast for today, and over the next 5 days, showing the fluxiation in temperatures through-out the day via
                a graph. Please click on the links <strong>below</strong> to start the tutorial:</p>
                <div class="panel-group" id="accordion">
                    <div class="panel panel-default">
                        <div class="card">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse1">Part 1: Searching by City</a>
                                </h4>
                            </div>
                            <div id="collapse1" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p>Start by firstly opening the weather page in another browser to follow along with this tutorial properly.</p>
                                    <ul>
                                    <li>Navigate to the input box at the top-left hand side of the screen which looks like:</li><img src="img/windo.JPG" style="display: inline-block;"/>
                                    <li>Next type in the city you want to return the weather forecast for by typing it inside of the input button, then pressing submit when completed.</li>
                                    <li>Once clicked it should return the following:</li></li><img src="img/Wheat.JPG" style="display: inline-block;"/>
                                    <li>As shown above, a 5 day weather forecast is displayed under, where it displays a description of the weather for the day, an image according to the conditions,
                                    the highest/lowest temperatures and followed by the windspeed.
                                    </li>
                                    <li >On the right side of the screen, a marker is placed on the map, where if you click it does the following...
                                    </li>
                                    
                                    <li >Lastly, a graph is shown underneath the map, that displays the variation in tempatures at differnet hours throughout the day.
                                    </li>
                                    </ul> 
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="panel panel-default">
                        <div class="card">
                            <div class="panel-heading">
                                <h4 class="panel-title">
                                    <a data-toggle="collapse" data-parent="#accordion" href="#collapse2">Part 2: Searching by Latitude/Longitude.</a>
                                </h4>
                            </div>
                            <div id="collapse2" class="panel-collapse collapse in">
                                <div class="panel-body">
                                    <p>Start by firstly opening the weather page in another browser to follow along with this tutorial properly.</p>
                                    <ul>
                                    <li>Navigate to the input box at the top-left hand side of the screen which looks like:</li><img src="img/windo.JPG" style="display: inline-block;"/>
                                    <li>Next enter the Latitude/Longitude of the area you want to return the weather forecast for by typing it inside of the input button, then pressing submit when completed.</li>
                                    <li>Once clicked it should return the following:</li></li><img src="img/Wheat.JPG" style="display: inline-block;"/>
                                    <li>As shown above, a 5 day weather forecast is displayed under, where it displays a description of the weather for the day, an image according to the conditions,
                                    the highest/lowest temperatures and followed by the windspeed.
                                    </li>
                                    <li >On the right side of the screen, a marker is placed on the map, where if you click it does the following...
                                    </li>
                                    
                                    <li >Lastly, a graph is shown underneath the map, that displays the variation in tempatures at differnet hours throughout the day.
                                    </li>
                                    </ul> 
    
                                </div>
                            </div>
                        </div>
                    </div>
                    


            </div>

        </div>
    </div>
</div>

<?php
include("eof.php");
?>

                                