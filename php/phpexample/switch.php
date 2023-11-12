<?php
$Today = 'Saturday';
switch ($Today){
    case 'Monday':
        echo 'wash on Monday';
        break;
    case 'Tuesday':
        echo 'Clean on Tuesday';
        break;
    case 'Wednesday':
        echo 'Clean on Wednesday';
        break;
    case 'Thursday':
        echo 'Clean on Thursday';
        break;
    case 'Friday':
        echo 'Clean on Friday';
        break;
    case 'Saturday':
    case 'Sunday':
        echo 'Rest on the Weekend';
        break;
}
?>