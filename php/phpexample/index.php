<?php
 $display_name = 'Thu Zar Myint';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/index.css">
    <title>HTML and PHP by <?php echo $display_name;?></title>
</head>
<body>
    <div id="wrap">
        <section class="siderbar">
            <div class="avatar">
                <img src="image/octicons_f0d7(0)_32.png" alt="Alert For Image">
                <h2>ITVisonHub</h2>
            </div>
            <h1><?php echo $display_name;?></h1>
            <p>Contact:<br>
                <a href="mailto:">EMAIL</a>
            </p>
            <hr>
            <ul>
                <li><a href=""><img src="image/FontAwesome_f099(0)_32.png" alt=""></a></li>
            </ul>
            <hr>
            <p class="p">Today: D, d M Y</p>
        </section>
        <section class="main">
            <h1>My First PHP Page</h1>
            <h2>Unit COnversion</h2>
            <?php include 'unitconverter.php';?>
            <hr>
            <h2>Daily Exercise</h2>
            <?php include 'exercise.php'?>
        </section>

        <section class="footer">
            &copy; 2020 ITVisonHub,<?php 
            echo date('Y');
            echo " " . $display_name . " .";
            // output e.g. 'Last modified: March 04 1998 20:43:59.'
            echo "Last modified: " . date ("F d Y H:i:s." , getlastmod());
            ?>
    
        </section>
    </div>
    
    
</body>
</html>