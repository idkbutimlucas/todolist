<?php
include('..\autoload.php');


if (isset($_POST['name'])) {
    $name = $_POST['name'];
    $teamManager = new TeamManager();
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
        button[name=createTeam] {
            background: #003366;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Admin - Create Team</h2>
    </div>

    <form method="post" action="../treatment/registerTeam.php">

        <?php echo display_error(); ?>

        <div class="input-group">
            <label>Team</label>
            <input type="text" name="name">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="createTeam"> + Create team</button>
        </div>
    </form>
    
    <form class="center" method="post" action=".\home.php">
        <div class="input-group">
            <button type="submit" class="btn" name="admin-home-page_btn">Admin Home Page</button>
        </div>
    </form>
</body>

</html>