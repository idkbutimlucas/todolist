<?php require('..\classes\fonction.php');
require('..\classes\rqt.php'); ?>

<!DOCTYPE html>
<html>

<head>
    <title>ToDoList | Modify</title>
    <link rel="stylesheet" href="..\assets\css\resgister.css">
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
        <h2>Modify</h2>
    </div>

    <form method="post" action="modify_user.php" method="POST">
        <!-- <input type="hidden" name="id" value="<?php echo ($id); ?>"> -->

        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="">
        </div>
        <div class=" input-group">
            <label>Email</label>
            <input type="email" name="email" value="">
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1" value="">
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2" value="">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="modify_btn">Modify</button>
        </div>
    </form>
</body>

</html>