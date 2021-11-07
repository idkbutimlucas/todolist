<?php
include '../autoload.php';

if (!isLoggedIn()) {
    $_SESSION['msg'] = "Vous devez vous connectez avant :)";
    header('location: ../login.php');
}

if (isset($_POST['text'])) {
    $todoManager = new TodoManager();
    $todo = $todoManager->add(getCurrentUserID(), $_POST['state'], $_POST['text'], 0);
    header('location: ../trello/trello_home.php');
}

?>