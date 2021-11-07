<?php
include './autoload.php';

if (!isLoggedIn()) {
    $_SESSION['msg'] = "Vous devez vous connectez avant :)";
    header('location: login.php');
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>ToDoList | Home</title>
    <link rel="stylesheet" type="text/css" href="assets\css\resgister.css">
</head>
<body>
<div class="header">
    <h2>Home Page</h2>
</div>
<div class="content">

    <div class="profile_info">
        <img src="assets\img\user.png">
        <div>
            <strong><?= getCurrentUsername() ?></strong>
            <small>
                <i style="color: #888;">(<?= getCurrentUserType() ?>)</i>
                <br>
                <a href="<?= HOME_URL ?>/logout.php" style="color: red;">logout</a>
                <a href="trello\trello_home.php" style="color: cornflowerblue;"> Trello Page</a>
            </small>

            <?php if (getCurrentUserType() == 'admin'): ?>
                <small>
                    <a href="admin\home.php" style="color: green;"> Admin Home Page</a>
                </small>
            <?php endif; ?>
        </div>
    </div>

</div>
</body>

</html>