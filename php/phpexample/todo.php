<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/todo.css">
    <title>To Do App</title>
</head> 
<body>
    <?php
        include 'list.php';
        $status = false;
        $field = 'priority';
        $filter = array();
        foreach ($list as $originalKey => $item){
        if ($status== 'all' || $item['complete'] == $status){
            if (isset($field) && isset($item[$field])){
                $filter[$originalKey] = $item[$field];
            } else{
                $filter[$originalKey] = $item['priority']+12;
            }
            // echo '<pre>';
            // var_dump($key,$item);
            // echo '</pre>';
        }
        //echo $key . ' = ' . $item['title'] . "<br />\n";
        asort($filter);
        //echo '<pre>';
        //var_dump($filter);
        //var_dump ($status, boolval('all'), $status == 'all');
        // var_dump($filter, $list);
            echo '</pre>';
        }
        echo '<table>';
        echo '<tr>';
        echo '<th> Title</th>';
        echo '<th> Priority</th>';
        echo '<th> Due Date</th>';
        echo '<th> Complete</th>';
        echo '</tr>';
        foreach ($filter as $id => $value){
        echo '<tr>';
        echo '<td>' . $list[$id]['title'] . "</td>\n";
        echo '<td>' . $list[$id]['priority'] . "</td>\n";
        echo '<td>' . $list[$id]['due'] . "</td>\n";

        echo '<td>';
        if ($list[$id]['complete']){
            echo 'Yes';
        } else{
            echo 'NO';
        }
        echo "</td>\n";
        echo '</tr>';
        }
        echo '</table>';
        ?>
</body>
</html>