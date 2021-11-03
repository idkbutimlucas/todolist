<?php
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
            <!-- show the meber list  -->
            <?php
            while ($ligne = $resultat->fetch_assoc()) {
                echo $ligne['username'] . ' ' . $ligne['user_type'] . ' ' . $ligne['email'];
            ?>
                <button onclick="location.href = 'modify_user.php';" name="modify_btn" type="submit" class="btn">Modify</button><br>
            <?php
            }
            ?>
        </div>
    </div>
</body>

</html>