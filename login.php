<?php
include './autoload.php';

if (isset($_POST['username'])){
    $username = $_POST['username'];
    $password =  md5($_POST['password']);
    $userManager = new UserManager();
    $login = $userManager->login($username,$password);
}

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <title>ToDoList | Login</title>
    <link rel="stylesheet" type="text/css" href="assets\css\resgister.css">
</head>

<body>
<div class="header">
    <h2>Login</h2>
</div>
<form method="post" action="login.php">

    <?php echo display_error(); ?>

    <div class="input-group">
        <label>Username</label>
        <input type="text" name="username">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="password" name="password">
    </div>
    <div class="input-group">
        <button type="submit" class="btn" name="login_btn">Login</button>
    </div>
    <p>
        Pas encore membre ? <a href="register.php">Sign up</a>
    </p>
</form>
</body>

</html>