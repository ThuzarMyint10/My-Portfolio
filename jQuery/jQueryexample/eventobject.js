// $('.spoiler button').on('click mouseleave',function(){
//     //show the spoiler text 
//     $('.spoiler span').show();
//     // Hide the "Reveal Spoiler" button
//     $('.spoiler button').hide();

// });
$('.spoiler').on('click', 'button', function(event){
    console.log(event.target);
    //show the spoiler text 
   $(event.target).prev().show();
  // Hide the "Reveal Spoiler" button
   $(event.target).hide();

});



// Create "Reveal Spoiler" button
const $button = $('<button> Reveal Spoiler </button>');
// Append to the page
$('.spoiler').append($button);

// Hide the spoiler text
$('.spoiler span').hide();
// When the button is pressed
