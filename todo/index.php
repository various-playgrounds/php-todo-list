<?php

require_once("entity.php");
session_start();
?>

<html>
<head>
    <title>my todos</title>
</head>
<body>
<h2>
    Next on my agenda
</h2>
<p><a href="create.php">add todo</a></p>

<?php

if (!isset($_SESSION['entities'])) {
    $_SESSION['entities'] = array();
}

// var_dump($_SESSION['entities']);

foreach($_SESSION['entities'] as $entity) {
    $id = $entity->getId();
    $title = $entity->getTitle();
?>
    <ul>
        <li><a href="detail.php?id=<?php echo $id?>"><?php echo $title ?></a></li>
        <button type="button"><a href="edit.php?id=<?php echo $id?>">Edit</a></button>
        <button type="button"><a href="delete.php?id=<?php echo $id?>">Delete</a></button>
    </ul>
<?php
}
?>
</body>
</html>
