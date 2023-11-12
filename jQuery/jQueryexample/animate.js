// $('#flashMessage').hide().slideDown(1000).delay(3000).slideUp();
$('#flashMessage').hide();
//PREVIEW BUTTON CLICK FUNTION
$('#btn').click(function (){

    const title = $('#areatext').val();
    const content = $('#nextarea').val();
    
    $('#blogTitlePreview').text(title);
    $('#blogContentPreview').html(content);

    $('#flashMessage').slideDown(1000).delay(3000).slideUp();


});