var questions = [
 ['How many states are in the United States?', 50],
 ['How many continents are there?', 7],
 ['How many legs does an insect have?', 6]
];
var correctAnswers = 0;
var question;
var answer;
var response;
var html;
var correct= [];
var wrong = [];
function print(message){
    var OutputDiv = document.getElementById('output');
    OutputDiv.innerHTML = message;
}

function buildList(arr) {
    var listHTML = '<ol>';
    for( var i = 0; i < arr.length; i += 1){
        listHTML += '<li>' + arr[i] + '</li>';
    }
    listHTML += '</ol>';
    return listHTML;
}
for ( var i = 0; i < questions.length; i += 1){
        question = questions[i][0];
        answer = questions[i][1];
        response = prompt(question);
        response = parseInt(response);
        if ( response === answer){
            correctAnswers += 1;
            correct.push(question);
        } else {
            wrong.push(question);
        }
}

html = "You got " + correctAnswers + " question(s) right.";
html += '<h1> You got these questions correct:</h1>';
html += buildList(correct);
html += '<h1> You got these questions wrong:</h2>';
html += buildList(wrong);
print(html);