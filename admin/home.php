<?php
include('..\autoload.php');

if (!isAdmin()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: ../login.php');
}

if (isset($_GET['logout'])) {
    session_destroy();
    unset($_SESSION['user']);
    header("location: ../login.php");
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>ToDoList | Home</title>
    <link rel="stylesheet" type="text/css" href="..\assets\css\resgister.css">
    <style>
        .header {
            background: #003366;
        }

        button[name=register_btn] {
            background: #003366;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Admin - Home Page</h2>
    </div>
    <div class="content">
        <!-- logged in user information -->
        <div class="profile_info">
            <img src="../assets\img\user.png">

            <div>
                <?php if (isLoggedIn()) : ?>
                    <strong><?= getCurrentUsername() ?></strong>

                    <small>
                        <i style="color: #888;">(<?= getCurrentUserType() ?>)</i>
                        <br>
                        <a href="home.php?logout='1'" style="color: red;">logout</a>
                        &nbsp; <a href="..\index.php"> home page</a>
                        &nbsp; <a href="create_user.php"> + add user</a>
                        &nbsp; <a href="createTeam.php"> + add team</a>
                        &nbsp; <a href="list_user.php"> ~ edit user</a>
                        &nbsp; <a href="listeTeam.php"> ~ edit team</a>

                    </small>

                <?php endif ?>
            </div>
        </div>
    </div>
</body>

</html>