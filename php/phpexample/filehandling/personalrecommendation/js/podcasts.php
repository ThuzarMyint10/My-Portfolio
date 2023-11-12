<?php
$title = "Podcasts";
    require ('../header.php');

    echo "<div class='container-fluid'>";
    echo "<h1>Podcasts Recommendations</h1>";
    echo "<hr>";
    
    $files = array();
    $dir = '../data/xml';

    if ($fh = opendir($dir)){
        while (($entry = readdir($fh) !== false)) {
            if (substr($entry, 0, 1) != '.') {
                $files[] = $dir . '/' . $entry;
            }
        }
        closedir($fh);
    }

    if (!empty($files)){
        foreach ($files as $file){

            echo '<div class="panel panel-default">';
            echo '<div class="panel-heading">';
            echo '<h3 class="panel-title"><a href="" target="_blank">TITLE</a></h3>';
            echo '</div>';
            echo '<div class="panel-body">';
            echo '<p>DESCRIPTION</p>';
            echo '<p><stroung>Sample: EPISODE DESCRIPTION</strong> - ';
            echo 'DESCRIPTION </p>';
            echo '<audio controls>';
            echo '<source src="" type="audio/mpeg">';
            echo 'Your browser does not support the audio element.';
            echo '</audio>';
            echo '<p><a href="" target="_blank">Learn more and subscribe</a></p>';
            echo '</div>';
            echo '</div>';
        }
    }
echo "</div>";
    require ('../footer.php');
?>