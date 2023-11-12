var randomNumber = getRandomNumber(10);
var guess;
var guessCount = 0;
var correctGuess = false;

function getRandomNumber(upper) {
    return Math.floor( Math.random() * upper + 1)
}

while( guessCount < 10) {
    guess = prompt ('I am thinking of a number 1 t0 10. What is it?');
    guessCount += 1;
    if( parseInt(guess) === randomNumber){
        correctGuess = true;
        break;
    }
   
} 
if(correctGuess){
    document.write('<h1> You guessed the number </h1>');
    document.write('It took you '+ guessCount + 'tries to get the number '+ randomNumber);
} else {
    document.write('<h1> Sorry. You did not guess the number.</h1>');
}
 