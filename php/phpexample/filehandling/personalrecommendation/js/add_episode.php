<?php
$title = "Add Books Form";
    require ('../header.php');

    echo "<div class='container-fluid'>";
    echo "<h1>Add Episode</h1>";
    echo "<hr>";
    echo "<div class='add_form'>";
    echo '<form action="" method="post">';
    echo '<div class="form-group">';
    echo '<label for="exampleFormControlInput1">Podcast</label>';
    echo '<select class="custom-select">';
    echo '<option selected>Free The Geek</option>';
    echo '<option value="1">Educate Yourself</option>';
    echo '<option value="2">Phproundtable</option>';
    echo '<option value="3">Voices Of The Elephpant</option>';
    echo '</select>';
    echo "</div>";
    echo '<div class="form-group">';
    echo '<label for="exampleFormControlSelect1">Title</label>';
    echo '<input type="text" class="form-control" name="link" id="exampleFormControlInput1" placeholder="http://">';
    echo "</div>";
    echo '<div class="form-group">';
    echo '<label for="exampleFormControlSelect2">Link</label>';
    echo '<input type="text" class="form-control" name="book_image_url" id="inlineFormInputGroupUsername2" placeholder="http://">';
    echo "</div>";
    echo '<div class="form-group">';
    echo '<label for="exampleFormControlSelect2">Date</label>';
    echo '<input type="text" class="form-control" name="book_image_url" id="inlineFormInputGroupUsername2" placeholder="http://">';
    echo "</div>";
    echo '<div class="form-group">';
    echo '<label for="exampleFormControlTextarea1">Descrioption</label>';
    echo '<textarea class="form-control" name="book_description" id="exampleFormControlTextarea1" rows="3"></textarea>';
    echo '</div>';
    echo '<div class="form-group">';
    echo '<label for="exampleFormControlInput1">Explict</label>';
    echo '<select class="custom-select">';
    echo '<option selected>clean</option>';
    echo '<option value="1">Yes</option>';
    echo '<option value="2">No</option>';
    echo '</select>';
    echo "</div>";
    echo '<div class="form-group">';
    echo '<label for="exampleFormControlSelect2">Duration</label>';
    echo '<input type="text" class="form-control" name="book_image_url" id="inlineFormInputGroupUsername2" placeholder="00:00:00">';
    echo "</div>";
    echo '<button type="submit" class="btn btn-success">Add Episode</button>';
    echo "</form>";
    echo "</div>";
    echo "</div>";
    
    require ('../footer.php');
?>