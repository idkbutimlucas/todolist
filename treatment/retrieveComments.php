<?php
include '../autoload.php';

$todoID = $_POST['todoID'];
$commentManager = new CommentManager();
$comments = $commentManager->getAllByTodoID($todoID);

die(json_encode($comments));