<?php
include("header.php");
?>

<div class="container-fluid">
    
    <div class="row justify-content-center">
        
        <div class= "col-xl-4">
            <h3 class="text-center">Air Quality Page</h3>
            <p class="text-center">Select and compare the pollution levels of two countries.</p>
        </div>
        
        <div class="col-xl-4">
            <select class="CountryDrop float-left" id="CountryDrop">
                <option value="default">Please select first country</option>
            </select>
        </div>

        
        <div class="col-xl-4">
            <select class="CountryDropR float-left" id="CountryDropR">
                <option value="default">Please select second country</option>
            </select>
        </div>
    </div>
    
    
    <div class="row justify-content-center">
        <div class="col-xl-6">

            
            <canvas class="myChartL" id="myChartL"></canvas>
        </div>
        
        <div class="col-xl-6">
            <canvas class="myChartR" id="myChartR"></canvas>
        </div>
    </div>
</div>


    
<script>
var option;
var pm25level;
var pm10level;
var so2level;
var no2level;
var o3level;
var colevel;
var bclevel;
var check = 0;
var checkr = 0;
var left_choice = 0;
var right_choice = 0;



    var dropdown = $("#CountryDrop");
    var dropdownR = $("#CountryDropR");
    
        $.ajax({
            url: "https://api.openaq.org/v1/countries",
            //gets a list of countries to populate the dropdown box
        
            error: function() {
                $('#info').html('<p> An error has occurred</p>');
            },
            
            success: function (data) {
 
                $.each(data.results, function (val, text){
                    
                    $('#CountryDrop').append('<option value="'+ data.results[val].code +'">' + data.results[val].name +'</option>');
                    $('#CountryDropR').append('<option value="'+ data.results[val].code + '">' + data.results[val].name + '</option>');
                    //takes each country from the api and creates a new option in the dropdown menu
                    //that has the value of its ISO code to filter results when getting measurement data
                    //console.log(dropdown);
                });
                
            }
        });
        

function dataload() {
//pulls the necessary data from the api


            $.ajax({  
            
            //to limit the result add + &limit=20" to the url

            url: "https://api.openaq.org/v1/latest?country=" + option + "&parameter=pm25",
            //takes the country chosen in the dropdown box and limits the results to only pm25 readings
            error: function() {
                $('#info').html('<p> An error has occurred</p>');
            },
            
            success: function (data) {
                console.log(data);
                try{
                pm25level = data.results[0].measurements[0].value;
                //pulls the most recent reading from the api
                //console.log(data);
                console.log(pm25level);
                }
                catch(error){
                    pm25level = "0";
                    //if there isnt a reading of this type of pollutant set its level to 0
                }
            }
            });
            
            $.ajax({  
            
            //to limit the result add + &limit=20" to the url

            url: "https://api.openaq.org/v1/latest?country=" + option + "&parameter=pm10",
            
            error: function() {
                $('#info').html('<p> An error has occurred</p>');
            },
            
            success: function (data) {
                console.log(data);
                try{
                pm10level = data.results[0].measurements[0].value;
                //console.log(data);
                console.log(pm10level);
                    
                }
                catch(error){
                    pm10level = "0";
                }
            }
            });
            
            $.ajax({  
            
            //to limit the result add + &limit=x" to the url

            url: "https://api.openaq.org/v1/latest?country=" + option + "&parameter=so2",
            
            error: function() {
                $('#info').html('<p> An error has occurred</p>');
            },
            
            success: function (data) {
                try{
                so2level = data.results[0].measurements[0].value;
                //console.log(data);
                console.log(so2level);    
                }
                catch(error){
                    so2level = "0";
                }
            }
            });
            
            $.ajax({  
            
            //to limit the result add + &limit=20" to the url

            url: "https://api.openaq.org/v1/latest?country=" + option + "&parameter=no2",
            
            error: function() {
                $('#info').html('<p> An error has occurred</p>');
            },
            
            success: function (data) {
                try{
                no2level = data.results[0].measurements[0].value;
                //console.log(data);
                console.log(no2level);    
                }
                catch(error){
                    no2level = "0";
                }
            }
            });
            
            $.ajax({  
            
            //to limit the result add + &limit=20" to the url
            url: "https://api.openaq.org/v1/latest?country=" + option + "&parameter=o3",
            
            error: function() {
                $('#info').html('<p> An error has occurred</p>');
            
                
            },
            
            success: function (data) {
                try{
                o3level = data.results[0].measurements[0].value;
                //console.log(data);
                console.log(o3level);    
                }
                catch(error){
                    o3level = "0";
                }
            }
            });
            
            $.ajax({  
            
            //to limit the result add + &limit=20" to the url
            url: "https://api.openaq.org/v1/latest?country=" + option + "&parameter=co",
            
            error: function() {
                $('#info').html('<p> An error has occurred</p>');
            },
            
            success: function (data) {
                try{
                colevel = data.results[0].measurements[0].value;
                //console.log(data);
                console.log(colevel);    
                }
                catch(error){
                    colevel = "0";
                }
            }
            });
            
            $.ajax({  
            
            //to limit the result add + &limit=20" to the url

            url: "https://api.openaq.org/v1/latest?country=" + option + "&parameter=bc",
            
            error: function() {
                $('#info').html('<p> An error has occurred</p>');
            },
            
            success: function (data) {
                try{
                bclevel = data.results[0].measurements[0].value;
                //console.log(data);
                console.log(bclevel); 
                //now that all the data has been retrieved, create the chart to display it
                           if(left_choice == 1 && right_choice == 0){

                            create_chart();
                           }
                           else if (right_choice == 1 && left_choice == 0){
                               
                               create_chartR();
                           }
                }
                catch(error){
                    bclevel = "0";
                            if(left_choice == 1 && right_choice == 0){
                                
                            create_chart();
                           }
                           else if (right_choice == 1 && left_choice == 0){
                               
                               create_chartR();
                           }
                }
            }
            });
            
            //create_chart();
}

function create_chart(){
    console.log(pm25level);
    check = 1;//a boolean variable to signal whether a chart already exists before creating a new one
    left_choice = 0;
var ctx = document.getElementById('myChartL');
var myChartL;

window.myChartL = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: ['pm25 \u00B5\u33A5', 'pm10 \u00B5\u33A5', 'so2 \u00B5\u33A5', 'no2 \u00B5\u33A5', 'o3 \u00B5\u33A5', 'co \u00B5\u33A5', 'bc \u00B5\u33A5'],
        datasets: [{
            label: ['Level of Pollution'],
            data: [pm25level,
            pm10level,
            so2level,
            no2level,
            o3level,
            colevel,
            bclevel
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)',
                'rgba(134, 134, 72, 0.5)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(134, 134, 72, 1)'
            ],
            borderWidth: 1
        }]
    },
    
    option: {
        legend: { display: true },
        title: {
            display: true,
            text: "Measurement in \u00B5\u33A5",
        }
    }
});
//Chart Load
}

function create_chartR(){
    checkr = 1;//a boolean variable to signal whether a chart already exists before creating a new one
    right_choice = 0;
var ctx = document.getElementById('myChartR');
var myChartR;
window.myChartR = new Chart(ctx, {
    type: 'horizontalBar',
    data: {
        labels: ['pm25 \u00B5\u33A5', 'pm10 \u00B5\u33A5', 'so2 \u00B5\u33A5', 'no2 \u00B5\u33A5', 'o3 \u00B5\u33A5', 'co \u00B5\u33A5', 'bc \u00B5\u33A5'],
        datasets: [{
            label: 'Level of Pollution',
            data: [pm25level,
            pm10level,
            so2level,
            no2level,
            o3level,
            colevel,
            bclevel
            ],
            backgroundColor: [
                'rgba(255, 99, 132, 0.5)',
                'rgba(54, 162, 235, 0.5)',
                'rgba(255, 206, 86, 0.5)',
                'rgba(75, 192, 192, 0.5)',
                'rgba(153, 102, 255, 0.5)',
                'rgba(255, 159, 64, 0.5)',
                'rgba(134, 134, 72, 0.5)'
            ],
            borderColor: [
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)',
                'rgba(134, 134, 72, 1)'
            ],
            borderWidth: 1
        }]
    },
    
    option: {
        legend: {display:true}
    }
});
//Chart Load
}

$('#CountryDrop').change(function(){ 
     option = $(this).val();
     //console.log(option);
     if(check == 1){
     window.myChartL.destroy();
     check = 0;
     left_choice = 1;
     dataload();
     }
     else{
         left_choice = 1;
         dataload();
     }
});

$('#CountryDropR').change(function(){
    option = $(this).val();
    if(checkr == 1){
        window.myChartR.destroy();
        checkr = 0;
        right_choice = 1;
        dataload();
    }
    else{
        right_choice = 1;
        console.log("It is actually doing this stuff");
        dataload();
    }
});
    </script>


<!-- You guys need to include EOF so that jquery and bootstrap js works -->
<?php
include("AQfooter.php");
include("eof.php");
?>