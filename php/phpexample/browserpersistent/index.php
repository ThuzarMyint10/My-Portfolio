<?php
 include("inc/header.php");
?>
    <?php
    echo "<div class='container text-center pt-4'>";
    echo "<h1>Welcome to our</h1>";
    echo "<h1>  ITVISIONHUB Story Game </h1>";
    echo "<p>  Enter the requested words and create your story. </p>";
    echo "<a href= 'js/play.php?' class='btn btn-outline-secondary'>Play</a>";
    echo "<h1 class='mt-3'>Reread Your Saved Stories</h1>";
    echo "</div>";

    if (isset($_COOKIE)){
        foreach($_COOKIE as $key => $value){
            echo '<div class="form-group">';
            echo '<a class="btn btn-info" href="inc/cookie.php?read='
                . urlencode($key) . '">';
            echo substr($key, 0, -10);
            echo ' ';
            echo date('d M Y H:i:s',(int) substr($key, -10));
            echo '</a>';
            echo '<a class="btn btn-danger" href="inc/cookie.php?delete='
                . urlencode($key) . '">';
            echo 'X</a>';
            echo '</div>';
        }
    }

    ?>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
</body>

</html>