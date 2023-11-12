<?php
function hello($arr){
    if (is_array($arr)){
        foreach ($arr as $name){
            echo "Hello, $name , how is it going!</br>";
        }
    } else {
        echo 'Hello, friends';
    }
}
$name = array(
    'Thuzar',
    'Tun Tun Min',
    'Myo Min Htet'
);
hello($name);
?>