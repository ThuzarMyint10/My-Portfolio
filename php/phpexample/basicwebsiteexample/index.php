<?php 
include("Inc/data.php");
include("Inc/function.php");
$pageTitle = "Personal Media Library";
$section = "null";
include("Inc/header.php"); ?>
        <div class="section catalog random">
            <div class="wrapper">
                <h2>May we suggest something</h2>
                <ul>
                    <?php 
                    $random = array_rand($catalog,4);
                    foreach($random as $id){
                        echo get_item_html($id,$catalog[$id]);
                    }
                    ?>
                </ul>
            </div>
        </div>
    </div><!--end content-->
    <?php include("Inc/footer.php"); ?>