var inStock = ['apples', 'eggs', 'milk', 'cookies', 'cheses', 'bread', 'pizza', 'broccoli', 'tofu'];
 var search;

 function print(message) {
     document.write( '<p>' + message + '</p>');
 }

 while (true) {
     search = prompt("Search for a product in our store. Type  'list' to show all of the product and 'quit' to exit");
     search = search.toLowerCase();
     if ( search === 'quit'){
         break;
     } else if ( search === 'list') {
         print( inStock.join(', '));
     } else {
         if (inStock.indexOf(search) > -1){
             print('Yes, we have' +  search  + ' in the store.')
         } else {
             print(search + ' is not in stock.');
         }
     }
     
 }