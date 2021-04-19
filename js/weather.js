var coord;
var map;
var search;
var longLat;

var lonsearch;
var latsearch;


$('#submit').on('click',function(){
         search = $('#city').val();
         
         citySearch();

});
    
$('#submit1').on('click',function(){
         search = "";
         lonsearch = $('#lon').val();
         latsearch = $('#lat').val();
         
         citySearch();

    });
    
    
function initMap(){
    var options = 
    {
        zoom:8,
        center:{lat: 55.8642, lng:-4.2518} 
            
    }//end
        //
        map = new google.maps.Map(document.getElementById('map'), options);
}
    
    
function citySearch(){
    
    $.ajax
    ({  //&APPID=814039b4f57df549b66dcbe448db0646
        // d5ec373982dd4974bc8063450b9cad4d
        //sets url as worldbank API for education
        url: ("https://api.openweathermap.org/data/2.5/forecast?q=" + search +"&lat=" + latsearch +"&lon="+ lonsearch +"&units=metric&mode=JSON&APPID=814039b4f57df549b66dcbe448db0646"),
        //Using get to retrieve the information
        type: "GET",
        //Formatting the data so it is returned in JSON format
        dataType: "json",
        //If the data is successfully pulled
        success: function(data)
        {
           
            
            
        console.log(data);
           // console.log(data);
            var date=[];
            var temp_min=[];
            var temp_max=[];
            var humidity=[];
            var description=[];
            var wind_speed=[];
            var sea_level = [];
            var city = [];
            var lat = data.city.coord.lat;
            var lon = data.city.coord.lon;
            coord = {lat: lat, lng: lon};
            var con;
            var accordian1;
            var contentConst = [];
            var icon=[];
            
            accordian1 = "";

           // console.log(data.list[0].dt_txt);
            //console.log(data.list.length);

            city.push(data.city.name);
            
            for(var i = 0; i < data.list.length; i++){
                date.push(data.list[i].dt_txt);
                temp_min.push(data.list[i].main.temp_min);
                temp_max.push(data.list[i].main.temp_max);
                humidity.push(data.list[i].main.humidity);
                sea_level.push(data.list[i].main.sea_level);
                description.push(data.list[i].weather[0].description);
                icon.push(data.list[i].weather[0].icon);
                wind_speed.push(data.list[i].wind.speed);
                
               
            contentConst.push(
            '<p>Description: ' + description[i] + '</p>'+
            '<p> Date/Time: ' + date[i] + '</p>' +
            '<p> Max Temp:  ' + temp_max[i] + '</p>' +
            '<p> Min Temp:  ' + temp_min[i] + '</p>'
            + '<p> Sea Level: ' +sea_level[i] + '</p>'
            + '<p> Wind Speed: ' + wind_speed[i] + '</p>');
            
            
            var contentConst1=
            ''+
            
            '<p>Description: ' + description[1] + '</p>'+
            '<p> Date/Time: ' + date[1] + '</p>' +
            '<p> Max Temp:  ' + temp_max[1] + '</p>' +
            '<p> Min Temp:  ' + temp_min[1] + '</p>'
            + '<p> Sea Level: ' +sea_level[1] + '</p>'
            + '<p> Wind Speed: ' + wind_speed[1] + '</p>' ;
            
            
            
            
            
             accordian1 += '<div class="accordian" id="accordian"> ' +
                                '<h5 class="mb-0">' +
                                '<button class="btn btn-link" type="button" data-toggle="collapse" data-target="#' + i +'" aria-expanded="true" aria-controls="one">'+ date[i] +
                                '</button></h5>'+ '</div>'
                                +'<div id="' + i + '" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">' +
                                ' <div class="card-body">' +
                                contentConst[i] + '</div></div></div>'
                                
                                
            //$('.content1').append(accordian1)

              var prev_infowindow;
              
              var marker = new google.maps.Marker({
                   position: coord,
                   map: map,
                });
                
                
                var infoWindow = new google.maps.InfoWindow({
                    content: accordian1,
                });
                
                marker.addListener("click",function(){
                   prev_infowindow = infoWindow;
                   
                   if(prev_infowindow = infoWindow){
                       prev_infowindow.close(map,marker);
                   }

                    infoWindow.open(map,marker);
         
                });

            }// End of Loop
            
            
            var forecast =[];
            var pic =[];
            var desc =[];
            var temp_maximum=[];
            var temp_minimum=[];
            var wind_speed1=[];
            var week_day = [];
            for(var y = 0; y<=data.list.length; y){
                
                week_day.push(date[y]);
                temp_minimum.push(temp_min[y]);
                temp_maximum.push(temp_max[y]);
                wind_speed1.push(wind_speed[y]);
                pic.push(icon[y]);
                desc.push(description[y]);
                y=(y+8);
                
                //console.log(y);
                console.log(week_day);
                //console.log(temp_maximum[y]);
                
                
                //week_day[0].splice(0,9);
                
            }
            
            let array1 = week_day.toString();
            
            
            for(var l = 0; l <=6; l++){
                array1 = array1.replace('2019-04-0' + l ,'');
                
                
            }
            
            //week_day.splice(0,2);
            
            //console.log(week_day);
            console.log(array1);
            
            $('#datey').html(week_day[0] + " - " +week_day[4]);

           $('#monday').html("<p> Monday</p><p>" + desc[0] + "</p>"+ "<img src='http://openweathermap.org/img/w/"+ icon[0] +".png' alt=Weather icon ><p>Temp Max: " + temp_maximum[0] + "</p>"+
            "<p>Temp Max: " + temp_minimum[0] + "</p>" + "</p><p> Wind Speed: " + wind_speed1[0] + "</p>" );
           
           $('#tuesday').html("<p> Tuesday </p> <p>" + desc[1] + "</p>"+ "<img src='http://openweathermap.org/img/w/"+ icon[1] +".png' alt=Weather icon ><p>Temp Max: " + temp_maximum[1] + "</p>"+
            "<p>Temp Min: " + temp_minimum[1] + "</p><p> Wind Speed: " + wind_speed1[1] + "</p>" );
            
           $('#wednesday').html("<p> Wednesday </p><p>" + desc[2] + "</p>"+ "<img src='http://openweathermap.org/img/w/"+ icon[2] +".png' alt=Weather icon ><p>Temp Max: " + temp_maximum[2] + "</p>"+
            "<p>Temp Min: " + temp_minimum[2] + "</p>" + "</p><p> Wind Speed: " + wind_speed1[2] + "</p>" );
            
           $('#thursday').html("<p> Thursday </p><p>" + desc[3] + "</p>"+ "<img src='http://openweathermap.org/img/w/"+ icon[3] +".png' alt=Weather icon ><p>Temp Max: " + temp_maximum[3] + "</p>"+
            "<p>Temp Min: " + temp_minimum[3] + "</p>" + "</p><p> Wind Speed: " + wind_speed1[3] + "</p>" );
            
           $('#friday').html("<p> Friday  </p><p>" + desc[4] + "</p>"+ "<img src='http://openweathermap.org/img/w/"+ icon[4] +".png' alt=Weather icon ><p>Temp Max: " + temp_maximum[4] + "</p>"+
            "<p>Temp Min: " + temp_minimum[4] + "</p>" + "</p><p> Wind Speed: " + wind_speed1[4] + "</p>" );

            var myColors = ['red', 'green', 'blue'];
            new Chart(document.getElementById("graph"), {
                
                //Setting the chart to type "bar"
                type: 'line',
                data: {
                  //Setting the chart labels to the date of enrollment each year I.E 2015-2019
                  labels: [date[0], date[1], date[2],
                           date[3], date[4], date[5],
                           date[6]],
                  datasets: [
                    {
                      //Showing that each year is measured by %
                      label: "Temp(°C)",
                      
                      //Gives each bar a different color
                    
                      
                      //Data pulled from the api which is set inside of an array, and is displayed accordingly
                      data: [temp_max[0],temp_max[1],
                             temp_max[2],temp_max[3],
                             temp_max[4],temp_max[5],
                             temp_max[6]
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
                    text: city + "'s forecast:",
                  }
                }
            });
            

        }//End of Success function
    }); // Finish Ajax Function
}

