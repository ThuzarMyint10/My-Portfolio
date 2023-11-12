<?php
$iceCream = array( 
    'Thuzar' => 'Black Cherry', 
    'Ko Tun' => 'Chocolate', 
    'Myo' => 'Cookies and Cream', 
    'Sai Soe' => 'Strawberry'
);
$iceCream['alena'] = 'Pistachio';
$iceCream ['Dave Thomas'] = 'Cookies and Cream';
//$iceCream [] = 'Vanilla';
$iceCream['Andrew'] =  true;
krsort($iceCream);
asort($iceCream);
var_dump($iceCream);
$keys = array(
    1 => 'a',
    '1' => 'b',
    1.5 => 'c',
    true => 'd'
);
// var_dump($keys);
?>