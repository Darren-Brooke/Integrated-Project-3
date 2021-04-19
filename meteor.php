<?php

include("header.php");
?>



<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <div class="card">
                <h3 class="card-title text-center mx-auto">Meteor Visualisation</h3>
                <div class="input-group mb-3">
                  <label style="margin-left: 10px" class = "input-group-append text-center p-2" for="year">Year: </label>
                  <input type="text" class="form-control " value="" name "year" id="year"> 
                  <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="button" id="submit">Submit</button>
                  </div>
                  
                </div>
                <p id = "coord" class="card-text text-center"></p>
                <p id = "name1" class="card-text text-center"></p>
                <p id = "mass" class="card-text text-center"></p>
                <p id = "answer" class="card-text text-center"></p>
                <p id = "answer" class="card-text text-center"></p>
            </div>
            <div class="card">
                <h3 class="card-title text-center mx-auto">Meteor Mass</h3>
                <canvas id="graph"></canvas>
            </div>
        </div>
        <div style ="padding: 0;" class="col-6">
            <div style="padding-right :0px;">
                <div class="float-right" id="map"></div>
            </div>
        </div>
    </div>
</div>

<script>
var myChart;

$('#submit').on('click',function(){
        year = $('#year').val();
        
        yearSearch();
        myChart.destroy();
    
});
    
function yearSearch(){

     $.ajax
    ({
        //sets url as worldbank API for education
        url: "https://data.nasa.gov/resource/y77d-th95.json?year="+year+"-01-01T00:00:00.000",
        //Using get to retrieve the information
        type: "GET",
        
        data: {
          "$limit": 30,
          "$$app_token" : "QRRl8ciRbKvgClMTzQItpIz5J",
        },
        //Formatting the data so it is returned in JSON format
        dataType: "json",
        //If the data is successfully pulled
        success: function(data)
        {
        
            //console.log(data.geolocation.coordinates[1]);
            
            var year;
            var mass;
            var status;
            var name;
            var reclat;
            var reclong;
            var years;
            var geolocation;
            var recclass;
            var coords;
            var found;
            var yur;
            var max;
            
            console.log(data);

            
            $('#graph').html("");
            $.each(data, function(key, val){
                 var coords = val.geolocation.coordinates;
                 var latLng = new google.maps.LatLng(coords[1], coords[0]);

                name = val.name;
                mass = val.mass;
                reclat = val.reclat;
                reclong = val.reclong;
                found = val.fall;
                yur = val.year;


                  var marker = new google.maps.Marker({
                   position: latLng,
                   map: map,
                });
                
                
                 var infoWindow = new google.maps.InfoWindow({
                    content: "<h4 class='text-center'>Meteor: " + name + "</h4> " +
                             "<p class='text-center'>Discovery: " + found + "</p> " +
                             "<p>Mass: " + mass + "</p>" +
                             "<p>Reclat: " + reclat + "</p>" +
                             "<p>Reclong: " + reclong + "</p>" +
                             "<p> Year: "+ yur
                });
                
                 marker.addListener("click",function(){
            
                    infoWindow.open(map,marker);

                })

            });
            
             var graph_mass=[];
             var graph_names=[];
             
             for(var y = 0; y <data.length; y++){
                 graph_mass.push(data[y].mass);
                 
                 if(graph_mass[y] == null){
                     graph_mass[y] = 0;
                 }
                 graph_names.push(data[y].name);
             }
        
             max = Math.max(graph_mass);
             console.log(max);
             
             var chartColors = {
            	red: 'rgb(255, 99, 132)',
            	orange: 'rgb(255, 159, 64)',
            	yellow: 'rgb(255, 205, 86)',
            	green: 'rgb(75, 192, 192)',
            	blue: 'rgb(54, 162, 235)',
            	purple: 'rgb(153, 102, 255)',
            	grey: 'rgb(201, 203, 207)'
            };
            
            
              myChart = new Chart(document.getElementById("graph"), {
                  
             
                
                //Setting the chart to type "bar"
                type: 'bar',
                data: {
                  //Setting the chart labels to the date of enrollment each year I.E 2015-2019
                  labels: [graph_names[0], graph_names[1], graph_names[2],
                           graph_names[3], graph_names[4], graph_names[5],
                           graph_names[6], graph_names[7], graph_names[8],
                           graph_names[9], graph_names[10], graph_names[11],
                           graph_names[12], graph_names[13], graph_names[14],
                           graph_names[15],
                                            
                           ],
                  datasets: [
                    {
                      //Showing that each year is measured by %
                      label: "Mass",
                      
                      //Gives each bar a different color
                     backgroundColor: ["#3e95cd", "#8e5ea2","#3cba9f","#e8c3b9","#c45850","#c4c4c4", "#020811"],
                      
                      //Data pulled from the api which is set inside of an array, and is displayed accordingly
                      data: [graph_mass[0],graph_mass[1],
                             graph_mass[2],graph_mass[3],
                             graph_mass[4],graph_mass[5],
                             graph_mass[6],graph_mass[7],
                             graph_mass[8],graph_mass[9],
                             graph_mass[10],graph_mass[11],
                             graph_mass[12],graph_mass[13],
                             graph_mass[14],graph_mass[15],
                             
                            ],//End of Data
                            
                         
                    borderColor: '#0000FF',
                    
                             
                    }//End of dataset
                    
                  ]//End of dataset
                  
                },
                
                options: {
                  legend: { display: true },
                  title: {
                    display: true,
                    //Sets the title of the graph to the name pulled from the API
                    text: "Meteors",
                  }
                }
            });
            //myChart.destroy();
            
            
            }//End of Success function

    }); // Finish Ajax Function

}
    

    
    function initMap(){
    var options = 
    {
        zoom: 3,
        center:{lat: 55.8642, lng:-4.2518} 
            
    }//end
        //
        map = new google.maps.Map(document.getElementById('map'), options);
}
</script>

<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDL7b5ov5dHqIZ90VYe9XL_O0GoD9FN0KE&callback=initMap"type="text/javascript"></script>