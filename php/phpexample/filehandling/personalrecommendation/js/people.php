<?php
$title = "People";
    require ('../header.php');

    if (($fh = fopen('../data/csv/people.csv', 'r')) !== false){
        $header = fgetcsv($fh);
        extract(array_flip($header));
    echo "<div class='container-fluid'>";
    echo "<h1>People Recommendations</h1>";
    echo "<hr>";
    echo "<div class='row'>";
    $count=0;
        while (($contact = fgetcsv($fh)) !== false ){
            if ($count > 0 && $count % 4 == 0){
                echo "</div>\n";
                echo '<div class="row">';
            } $count++;
    echo "<div class='col-xs-6 col-md-3'>";
    echo "<div class='thumbnail'>";
    echo '<img class="people" src="' . $contact[$img] . '">';
    echo '<div class="caption">';
    echo '<h4 class="media-heading">' .$contact[$first];
    echo ' ' . $contact[$last] .'</h4>';
    echo '<a href="http://' . $contact[$website] . '" target="_blank">'. $contact[$website] . '</a>';
    echo '<br>';
    echo 'Twitter: <a href="https://twitter.com/' . $contact[$twitter] . '" target="_blank">@' . $contact[$twitter] . '</a>';
    echo "</div>";
    echo "</div>";
    echo "</div>";
    
        }
    echo "</div>"; 
    echo "</div>";

    fclose($fh);

    }
    
    require ('../footer.php');
?>