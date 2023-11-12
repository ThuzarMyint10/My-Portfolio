<?php
$name = array(
    'Lwin' => 'Frog',
    'Moe' => 'Teacher',
    'Mike' => 'Teacher'
);
// foreach (array_keys($name) as $name){
//     echo "Hello, $name";
// }
function print_info($value, $key){
    echo "$key is a $value.";
}
array_walk($name, 'print_info');
?>