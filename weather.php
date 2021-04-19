<?php
include("header.php");

?>

<div style="padding-left: 0;"class="container-fluid">
    <div class="row">
        <div style = "padding-right: 5px;" class="col-7">
            <div class="card">
                <h3 id="weatherheader"class="text-center">Weather Page</h3>
                <p class="text-center">Welcome to the Weather Page! Here you will be able to search the 5 Day Weather Forecast for any city,
                                  using the search functions below:</p>
            
                 <div class="input-group mb-3">
                  <label style="margin-left: 10px" class = "input-group-append text-center p-2" for="city">City Name: </label>
                  <input type="text" class="form-control " value="Glasgow" name "search" id="city"> 
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="submit">Submit</button>
                  </div>
                </div>

                <div class="input-group mb-3">
                  <label style = "margin-left: 15px" class = "input-group-append text-center  " for="lat">Latitude/Longitude: </label>
                  <input style="margin-right: 10px;" type="text" class="form-control d-block" value="" name "lat" id="lat">
                  <input type="text" class="form-control d-block " value="" name "lon" id="lon"> 
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="submit1">Submit</button>
                  </div>
                </div>
              
            </div>
            
            
            
                <div class="card content1">
                <h3 class="card-title text-center mx-auto">Forecast (5 Days)</h3>
                <h5 id ="datey"class="card-title text-center mx-auto"></h5>
                <div class="row">
                    <div style="margin-left: 40px;" id="monday" class="col-2  text-center ml-6 verticalLine"></div>
                    <div id="tuesday"  class="col-2  text-center mr-2 ml-1 verticalLine"><p></p></div>
                    <div id="wednesday"  class="col-2  text-center mr-3 ml-1 verticalLine"><p></p></div>
                    <div id="thursday" class="col-2  text-center mr-2 ml-1 verticalLine"><p></p></div>
                    <div id="friday"  class="col-2  text-center  ml-1 "><p></p></div>
                    

                </div>

            </div><!--End of Card-->
            

        </div><!--End Col 6-->
        
        <div class="col-5">
            <div style="margin-top: 0;" class="card">
                <div class="card">
                <div style="height:40%;" class="" id="map"></div>
            </div>
            <h3 style="margin-top: 5px;" class="card-title text-center mx-auto">Today's Forecast</h3>
                <canvas id="graph"></canvas>
            </div>
            
            

        </div>
</div>
</div>

    
    
<!--

    </div><!-- End of Row-->
    
    
        <!--<div style="padding-left:0px;" class ="col-4 map_weather">
            <div class="weather_map"id="map"></div>
        </div>-->
<script src ="/js/weather.js"></script>
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL7b5ov5dHqIZ90VYe9XL_O0GoD9FN0KE&callback=initMap"type="text/javascript"></script>
<?php
include("eof.php");
?>



