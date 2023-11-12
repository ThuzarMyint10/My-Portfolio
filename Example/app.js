(function() {
    var openDialog = document.getElementById('openDialog');
    console.log(openDialog);
    var openModalDialog = document.getElementById('openModalDialog');
    var dialogwindow= document.getElementById('dialogWindow');

    openDialog.addEventListener('click', function(){
        dialogwindow.show();
    });
    openModalDialog.addEventListener('click', function(){
        dialogwindow.showModal();
    });


})();