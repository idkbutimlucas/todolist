<?php
include('..\autoload.php');

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password =  md5($_POST['password_1']);
    $userType = $_POST['user_type'];
    $userManager = new UserManager();
    $login = $userManager->register($username, $email, $password, $userType, null, 1, false);
}


?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <title>Registration system PHP and MySQL - Create user</title>
    <link rel="stylesheet" type="text/css" href="..\assets\css\resgister.css">
    <style>
        .header {
            background: #003366;
        }

        button[name=admin-home-page_btn],
        button[name=register_btn] {
            background: #003366;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Admin - create user</h2>
    </div>

    <form method="post" action="create_user.php">

        <?php echo display_error(); ?>

        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username">
        </div>
        <div class="input-group">
            <label>Email</label>
            <input type="email" name="email">
        </div>
        <div class="input-group">
            <label>User type</label>
            <select name="user_type" id="user_type">
                <option value=""></option>
                <option value="admin">Admin</option>
                <option value="user">User</option>
            </select>
        </div>
        <div class="input-group">
            <label>Password</label>
            <input type="password" name="password_1">
        </div>
        <div class="input-group">
            <label>Confirm password</label>
            <input type="password" name="password_2">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="register_btn"> + Create user</button>
        </div>
    </form>
    <form class="center" method="post" action=".\home.php">
        <div class="input-group">
            <button type="submit" class="btn" name="admin-home-page_btn">Admin Home Page</button>
        </div>
    </form>
</body>

</html>