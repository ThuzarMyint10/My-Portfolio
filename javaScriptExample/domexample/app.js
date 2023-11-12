const myHeading = document.getElementById('myHeading');
const myButton = document.getElementById('myButton');
const myTextInput = document.getElementById('textInput');

myButton.addEventListener('click', () => {
    myHeading.style.color = myTextInput.value ;

});