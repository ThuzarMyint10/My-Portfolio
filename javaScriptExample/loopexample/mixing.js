var questions = [
    { questin:'How many states are in the United States?', 
      answer: 50},
    { question: 'How many continents are there?',
      answer: 7},
    { question: 'How many legs does an insect have?',
      answer: 6}
   ];
var correctAnswers = 0;
var question;
var answer;
var response;
var html;
var correct= [];
var wrong = [];
   function print(message){
    document.write(message);
}
   
for ( var i = 0; i < questions.length; i += 1){
    question = questions[i].question;
    answer = questions[i].answer;
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
print(html);