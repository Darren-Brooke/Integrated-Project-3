<?php
include("header.php");
?>


<div class="container-fluid" style="padding-left: 0; padding-right: 0;">
    <div class="row">
        <div class ="col-12">
            <div id="map"></div>
        </div>
    </div>
</div>

<html>

<head>
    <style>
        /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */

    </style>
    <!--We will use JQuery library (https://jquery.com/) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>

<body>
    
    <script>

        var map;
        //initMap() called when Google Maps API code is loaded - when web page is opened/refreshed 
        function initMap() {
            map = new google.maps.Map(document.getElementById('map'), {
                zoom: 2,
                center: new google.maps.LatLng(55, -4), // Center Map. Set this to any location that you like
                mapTypeId: 'terrain' // can be any valid type
            });
        }

        var thelocation;
        var titleName;

                // The following uses JQuery library
                $.ajax({
                    // The URL of the specific data required
                  
                    url: "https://earthquake.usgs.gov/earthquakes/feed/v1.0/summary/all_week.geojson",
                    
                    // Called if there is a problem loading the data
                    error: function () {
                        $('#info').html('<p>An error has occurred</p>');
                    },
                    // Called when the data has succesfully loaded
                    success: function (data) {
                        console.log(data);
                        i = 0;
                        var markers = []; // keep an array of Google Maps markers, to be used by the Google Maps clusterer
                        $.each(data.features, function (key, val) {
                            // Get the lat and lng data for use in the markers
                            var coords = val.geometry.coordinates;
                            var latLng = new google.maps.LatLng(coords[1], coords[0]);
                            var location = val.properties.place;
                            var mag = val.properties.mag;
                            // Now create a new marker on the map
                            var marker = new google.maps.Marker({
                                position: latLng,
                                map: map,
                            
                                
                            });
                            
                            the_href = val.properties.url + "\'" + ' target=\'_blank\'';
                                
                            markers[i++] = marker; // Add the marker to array to be used by clusterer
                            
                        var infowindow = new google.maps.InfoWindow({
                                  content: location + ' ' + mag
                        });
                        
                        marker.addListener('click', function(){
                            infowindow.open(map, marker);
                        })
                        });
                        var markerCluster = new MarkerClusterer(map, markers,
                            { imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m' });

                            
                    }
                });
        //    });
 //       });
    </script>

    <!-- Need the following code for clustering Google maps markers-->
    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js">
    </script>
    <!-- Need the following code for Google Maps -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdlFKs_EEoJFBdt5w5_spCWDiqlseJlDw&callback=initMap">
    </script>
</body>

</html>