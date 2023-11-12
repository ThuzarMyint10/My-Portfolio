// $('.spoiler button').on('click mouseleave',function(){
//     //show the spoiler text 
//     $('.spoiler span').show();
//     // Hide the "Reveal Spoiler" button
//     $('.spoiler button').hide();

// });
$('.spoiler').on('click', 'button', function(){
     //show the spoiler text 
    $('.spoiler span').show();
   // Hide the "Reveal Spoiler" button
    $('.spoiler button').hide();

});



// Create "Reveal Spoiler" button
const $button = $('<button> Reveal Spoiler </button>');
// Append to the page
$('.spoiler').append($button);

// Hide the spoiler text
$('.spoiler span').hide();
// When the button is pressed
