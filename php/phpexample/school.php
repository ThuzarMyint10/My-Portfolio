<?php
$firstName = 'Lwin';
$lastName = 'Moe';
$currentGrade = 9;
$finalAverage = .88;
$messageBody = '';

if (!$firstName || !$lastName){
    echo 'Please enter a student name';
} elseif ($currentGrade < 0 || $currentGrade >12){
    echo 'This is only for high school students. Please enter a grade between 9 and 12';
} else { 
    if($finalAverage < .70)  {
        $messageBody = 'we look forward to seeing you at summer school, beginning July 1st';
    } else {
        switch ($currentGrade){
            case 9;
               $messageBody = 'Congratulations on completing your fresham year in high school! We will see you on September 1st for the start of your sophomore year!';
               break;
            case 10;
            $messageBody = 'Congratulations on completing your fresham year in high school! We will see you on September 1st for the start of your junior year!';
            break;
            case 11;
            $messageBody = 'Congratulations on completing your fresham year in high school! We will see you on September 1st for the start of your senior year!';
            break;
            case 12;
            $messageBody = 'Congratulations! You have graduated High School! Do not for get to come back and visit.';
            break;
            default:
                $messageBody = 'Error: Grade Level is not 9-12';
        }
    }
    echo "Dear $firstName $lastName \n";
    echo $messageBody;
}
?>