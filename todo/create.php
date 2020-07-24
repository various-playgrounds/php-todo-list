<?php
/**
 * Created by PhpStorm.
 * User: mayomi
 * Date: 9/3/17
 * Time: 9:40 AM
 */

require_once 'db_connect.php';//bring the database connection file in
require_once("class.php");
session_start();

if(isset($_POST['submit'])) {
    $title = $_POST['todoTitle'];// grap what was filled in title field
    $description = $_POST['todoDescription']; //grap what was filled in description field

    // check strings
    function check($string){
        $string  = htmlspecialchars($string);
        $string = strip_tags($string);
        $string = trim($string);
        $string = stripslashes($string);
        return $string;
    }

    // check for empty title
    if(empty($title)){
        $error  = true;
        $titleErrorMsg = "Title cannot be empty";
    }
    // check for empty description
    if(empty($description)){
        $error = true;
        $descriptionErrorMsg = "Description cannot be empty";
    }

    global $entities;
    if (!isset($entities)) {
        $entities = array();
    }

    $entity = new Entity();
    $entity->setId($title);
    $entity->setTitle($description);
    $entity->setDate('2020-07-20');
    array_push($_SESSION['entities'], $entity);
    echo "You added a new todo";
}
?>

<html>
<head>
    <title>Create Todo list</title>
</head>
<body>
<h1>Create Todo List</h1>
<button type="submit"><a href="index.php">View all Todo</a></button>
<form method="post" action="create.php">
    <p>Todo title: </p>
    <input name="todoTitle" type="text">
    <p>Todo description: </p>
    <input name="todoDescription" type="text">
    <br>
    <input type="submit" name="submit" value="submit">
</form>
</body>
</html>
