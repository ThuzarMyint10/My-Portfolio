<?php

if ($fh = fopen('data/html/combine.html', 'w')){
    fwrite($fh, file_get_contents('data/html/states.html'));

    fwrite($fh, PHP_EOL. '<optgroup label="US Outlying Territories">');
    fwrite($fh, PHP_EOL.file_get_contents('data/html/territories.html'));
    fwrite($fh, PHP_EOL.'</optgroup>');

    fwrite($fh, PHP_EOL. '<optgroup label="US Outlying Territories">');
    fwrite($fh, PHP_EOL.file_get_contents('data/html/territories.html'));
    fwrite($fh, PHP_EOL.'</optgroup>');

    fclose($fh);
}

echo '<select>';
include 'data/html/combine.html';
echo '</select>';

?>