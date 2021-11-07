<?php
include '../autoload.php';

$todoID = $_POST['todoID'];
$text = $_POST['text'];
$idUser = getCurrentUserID();
$commentManager = new CommentManager();
$comment = $commentManager->add($idUser,$todoID, $text);
die($comment);