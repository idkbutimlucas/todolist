<?php
include '../autoload.php';
require('..\classes\fonction.php');
require('..\classes\rqt.php'); ?>
<?php
$userID = $_POST['userID'];

if (isset($_POST['username'])) {
    $userManager = new UserManager();
    $userToModify = new User($userID, $_POST['username'], $_POST['email'], $_POST['user_type'], '', $_POST['status']);
    $userManager->update($userToModify);
}

$userManager = new UserManager();
$user = $userManager->get($userID);
?>
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

    <form class="content" method="post" action="modify_user.php">
        <input type="hidden" name="userID" value="<?= $user->id ?>">
        <div class="input-group">
            <label>Username</label>
            <input type="text" name="username" value="<?= $user->username ?>">
        </div>
        <div class=" input-group">
            <label>Email</label>
            <input type="email" name="email" value="<?= $user->email ?>">
        </div>
        <div class="input-group">
            <label>User type</label>
            <select name="user_type" id="user_type">
                <option value="admin" <?= $user->user_type == 'admin' ? 'selected' : '' ?>>Admin</option>
                <option value="user" <?= $user->user_type == 'user' ? 'selected' : '' ?>>User</option>
            </select>
        </div>
        <div class="input-group">
            <label>Status</label>
            <select name="status" id="status">
                <option value="1" <?= $user->status == '1' ? 'selected' : '' ?>>Active</option>
                <option value="0" <?= $user->status == '0' ? 'selected' : '' ?>>Inactive</option>
            </select>
        </div>
        <div class="input-group">
            <button type="submit" class="btn">Modify</button>
        </div>
    </form>
    <form method="post" action=".\list_user.php">
        <div class="input-group">
            <button type="submit" class="btn">Liste User</button>
        </div>
    </form>
</body>

</html>