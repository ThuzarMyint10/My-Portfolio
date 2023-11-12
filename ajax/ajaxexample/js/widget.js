$(document).ready(function(){
    var url = "./data/employees.json";
    $.getJSON(url, function(response){
        var statusHTML = '<ul class= "bulleted">';
        $.each(response, function(index, employees){
            if(employees.Inoffice === true){
                statusHTML += '<li class="in">';
            } else {
                statusHTML += '<li class="out">';
            }
        statusHTML += employees.name + '</li>';
   
        });
        statusHTML += '</ul>';
        $('#employeeList').html(statusHTML);
    }); //end get JSON
    
    $.getJSON('./data/rooms.json', function(response){
        var roomStatus = '<ul class="rooms">';
        $.each(response, function(index, evt){
            if(evt.available === true){
                roomStatus += '<li class="empty">';
            } else {
                roomStatus += '<li class="full">';
            }
        roomStatus += evt.room + '</li>';
   
        });
        roomStatus += '</ul>';
        console.log(roomStatus);
        $('#roomLists').html(roomStatus);
    }); //end get JSON
}); //end ready