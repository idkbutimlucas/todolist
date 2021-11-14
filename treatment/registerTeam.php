<?php
include '../autoload.php';

if (!isLoggedIn()) {
    $_SESSION['msg'] = "Vous devez vous connectez avant :)";
    header('location: ../login.php');
}

if (isset($_POST['name'])) {
    $teamManager = new TeamManager();
    $team = $teamManager->createteam($_POST['name']);
    header('location: ../admin/listeTeam.php');
}

if (isset($_POST['delet'])){
    $teamManager = new TeamManager();
    $team= $teamManager->delet($_POST['delet']);
    header('location: ../admin/listeTeam.php');
}
