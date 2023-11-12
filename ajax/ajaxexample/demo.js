var url = '/employees.json';
var data = {
    firstNmae: "Dave",
    lastNName: "McFarland"
};
var callback = function (response){
        //do something with the response
};
$.get(url, data, callback);