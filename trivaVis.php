<?php
include("header.php");


?>  <!--Main row -->
<div class="container-fluid">
    
        <!-- Trivia Card -->
        <div class="row justify-content-center">
            <div class="col-8">
                <div style ="height: 60%;"class="card w-75 mx-auto">
                    <div class="card-body">
                        <h3 class="card-title text-center mx-auto">Trivia Quiz!</h3>
                        <p id = "question" class="card-text text-center"></p>
                        <p id = "answer" class="card-text text-center"></p>
                        <div class="input-group mb-3">
                          <label class = "input-group-append text-center  " for="ans"> Answer:  </label>
                          <input type="text" class="form-control d-block " value="" name "ans" id="ans"> 
                          <div class="input-group-append">
                            <button class="btn btn-outline-secondary" type="button" id="submit">Submit</button>
                          </div>
                        </div>
                        <p style = "color: green;"id = "response" class = "card-text text-center" ></p>
                        
                        <p id = "score"style="margin-top: 10px;"></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
    

<script>

var questions = [];
var correct_answers=[];
var incorrect_answers = [];
var allAnswers =[];
var aa;
var counter = 0;
    
var currentQuestion;
var currentAnswer = [];
var random = Math.floor((Math.random() * 50) + 1);
    
loadQuestions();
console.log(counter);
$('#submit').on('click',function(){
    quizRules();
});

    
function loadQuestions(){
    //console.log(hash);
    $.ajax
    ({
        //sets url as worldbank API for education
        url: "https://opentdb.com/api.php?amount=50&category=18",
        //Using get to retrieve the information
        type: "GET",
        //Formatting the data so it is returned in JSON format
        dataType: "json",
        //If the data is successfully pulled
        success: function(data)
        {
            
            //console.log(data);
            for(var i = 0; i < data.results.length; i++){
                
                questions.push(data.results[i].question);
                correct_answers.push(data.results[i].correct_answer);
                incorrect_answers.push(data.results[i].incorrect_answers);
            }
            
            aa = incorrect_answers[random];
            aa.join("," + " ");
            currentQuestion = questions[random];
            currentAnswer = correct_answers[random];

            $('#question').html(currentQuestion);
            $('#answer').html( aa + ", " + currentAnswer);
           
        }//End of Success function
    }); // Finish Ajax Function
}

function game(){
    //Question Resets
    $('#ans').val("");
    counter++;
    random = Math.floor((Math.random() * 50) + 1);
    currentAnswer = "";
    currentQuestion =[];
    
    //Load New Questions/Answers
    aa = incorrect_answers[random];
    currentQuestion = questions[random];
    currentAnswer = correct_answers[random];
    
    $('#question').html(currentQuestion);
    $('#answer').html( aa + ", " + currentAnswer);

}

function quizRules(){
var user_answer = $('#ans').val();


    if (user_answer == currentAnswer){
        $('#response').html("Correct!");
        $('#score').html("Answered correctly: " + counter + "/10");
        game();
        //console.log(counter);
    }else if(counter == 10){
        
        currentAnswer = "";
        currentQuestion =[];
        
        $('#question').html("Game over!<br><p>Your Final Score:" + counter);
        
    }
    else if(user_answer != currentAnswer){
        $('#response').html("Incorrect Please Try again!");
        user_answer = ""; 
    }
}


</script>





<?php
include("eof.php");
?>