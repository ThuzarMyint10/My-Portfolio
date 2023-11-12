<?php
require_once "src/config.php";
if (isset($_GET['id'])){
    $content = new Posts(
        $repo,
        filter_input(
            INPUT_GET,
            'id',
            FILTER_SANITIZE_NUMBER_INT
        )
        );
}

if (!isset($content) || $content->count() != 1 || $content->current()->status != "published")
{
    $content = new Posts($repo);
} 

require 'views/header.php';

if ($content->count() == 1){
    include 'views/single.php';
} else{
foreach ($content as $item){
    include 'views/list.php';
    }
}

require 'views/footer.php';