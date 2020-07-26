<?php

require_once("entity.php");
session_start();

?>

<html>
<head>
    <title>Edit Todo list</title>
</head>
<body>
<button type="submit"><a href="index.php">View all Todo</a></button>
</body>
</html>

<?php

if(isset($_GET['id'])){
    $id = intval($_GET['id']);

    $found = False;
    foreach($_SESSION['entities'] as $index => $entity) {
        if ($id === $entity->getId()) {
            $found = True;
            break;
        }
    }

    if ($found) {
        echo "
            <h2>Edit Todo</h2>    
            <form action='edit.php?id=$id' method='post'>
            <p>Title</p>
            <input type='text' name='title' value='$title'>
            <br>
            <input type='submit' name='submit' value='edit'>
            </form>
        ";
    } else {
        echo "no todo";
    }

    if(isset($_POST['submit'])){
        $title = $_POST['title'];
        $updated = False;
        foreach($_SESSION['entities'] as $index => $entity) {
            if ($id === $entity->getId()) {
                $_SESSION['entities'][$index]->setTitle($title);
                $updated = True;
            }
        }
        if($updated){
            echo "successfully updated";
        } else{
            echo "cannot update title";
        }
    }
}

