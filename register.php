<?php
include './autoload.php';

if (isset($_POST['username'])){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password =  md5($_POST['password_1']);
    $userManager = new UserManager();
    $login = $userManager->register($username,$email,$password,'user',null, 1,true);
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>ToDoList | Register</title>
    <link rel="stylesheet" href="assets\css\resgister.css">
</head>

<body>
<div class="header">
    <h2>Register</h2>
</div>
<form method="post" action="register.php">
    <?php echo display_error(); ?>

    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username" >
    </div>
    <div class="input-group">
        <label>Email</label>
        <input type="email" name="email">
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
        <button type="submit" class="btn" name="register_btn">Register</button>
    </div>
    <p>
        Déjà membre ? <a href="login.php">Sign in</a>
    </p>
</form>
</body>

</html>