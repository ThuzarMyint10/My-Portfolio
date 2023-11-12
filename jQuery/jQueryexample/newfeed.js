const $odd = $('a:odd');
const $secureLinks = $('a[href^="https://"]');
const $pdfs = $('a[href$=".pdf"]');
const $psfCheck = $('<label><input type="checkbox">Allow PDF downloads</label>');

$secureLinks.attr('target', '_blank');
$pdfs.attr('download', true); 

$odd.css('backgroundColor', 'lightgray');
$secureLinks.addClass('secure');
$pdfs.addClass('pdf');
$('#links').append($psfCheck);

$pdfs.on('click', function(event){
    // check if checkboxe has been checked
    // if zero checkboxes are checked
    if($(':checked').length === 0)
    {
        // prevent download of document
        event.preventDefault();
        // alert the user
        alert('Please check the box to allow PDF downloads')
    }
});

$('#links').append($psfCheck);

$('a').each(function(){
    const url = $(this).attr('href');
    $(this).parent().append('('+url+')');
});