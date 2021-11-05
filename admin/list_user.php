<?php
include '../autoload.php';
require_once('..\classes\fonction.php');
require('..\classes\rqt.php');
?>

<!DOCTYPE html>
<html>

<head>
    <title>ToDoList | Member Page</title>
    <link rel="stylesheet" type="text/css" href="..\assets\css\resgister.css">
    <style>
        .header {
            background: #FF912A;
        }

        button[name=modify_btn] {
            background: #FF912A;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Admin - Member Page</h2>
    </div>
    <div class="content">
        <div class="user-goup">
            <?php
            $users = new UserManager();
            $users = $users->getAll();

            foreach ($users as $user) {
            ?>
                <form action="./modify_user.php" method="post">
                    <p>
                        <span class="<?= $user->status == '1' ? 'userActive' : 'userInactive' ?>"><?= $user->username ?></span>
                        <small><?= $user->email ?></small>
                    </p>
                    <input type="hidden" name="userID" value="<?= $user->id ?>">
                    <input type="submit" value="Modifier">
                </form>

            <?php
            }
            ?>

        </div>
    </div>
    <form class="center" method="post" action=".\home.php">
        <div class="input-group">
            <button type="submit" class="btn">Admin Home Page</button>
        </div>
    </form>
</body>

</html>