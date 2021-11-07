<?php
include '../autoload.php';

if (!isLoggedIn()) {
    $_SESSION['msg'] = "Vous devez vous connectez avant :)";
    header('location: ../login.php');
}

$todoManager = new TodoManager();

foreach ($_POST as $todoID => $status){
    $current = $todoManager->updateStatus($todoID, $status);
}

//header('location: ../trello/trello_home.php');


?>