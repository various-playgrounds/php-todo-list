<?php
require_once("entity.php");
session_start();

if(isset($_GET['id'])){
    $id = intval($_GET['id']);
    foreach($_SESSION['entities'] as $index => $entity) {
    	if ($id === $entity->getId()) {
    		unset($_SESSION['entities'][$index]);
    		break;
    	}
    }
    echo 'Todo successfully deleted';
}