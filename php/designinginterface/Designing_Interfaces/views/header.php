<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $content->getTitle(); ?></title>

    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="assets/css/custom.css">
    <script src="assets/js/scripts.js"></script>
</head>
<body>
<div class="navbar-wrapper">
    <div class="container">

        <nav class="navbar navbar-toggleable-md navbar-inverse fixed-top bg-inverse">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="navbar-brand" href="index.php">ITVisionHub Blog</a>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <ul class="navbar-nav mr-auto">
                    <?php
                        foreach (new Pages($repo) as $page){
                            echo '<li class="nave-item';
                            if (isset($slug) && $slug == $page->slug){
                                echo 'active';
                            }
                            echo '">';
                            echo '<a class="nav-link" href="index.php?slug='
                                . $page->slug . '">';
                                echo ucwords(str_replace('-', ' ', $page->slug));
                                echo '</a></li>';
                        }
                    ?>
                </ul>
                <ul class="navbar-nav mt-2 mt-md-0">
                   <li class="nav-item<?php
                    if ($_SERVER['SCRIPT_NAME'] == '/blog.php'){
                        echo ' active';
                    }
                   ?>">
                       <a class="nav-link" href="blog.php">Latest Blog Posts</a>
                    </li>
                    <a href="events.php" class="nav-link">Events</a>
                </ul>
            </div>
        </nav>

    </div>
</div>

<?php if ($content instanceof Pages){?>
    <!-- Begin page content -->
    <div id="myCarousel" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img class="first-slide" src="assets/img/<?php
                echo $content->featuredImage();?>" alt="First slide">
            </div>
        </div>
    </div>

<?php }?>
<div class="container">
    <div class="page-header">
        <h1><?php echo $content->getTitle(); ?></h1>
    </div>