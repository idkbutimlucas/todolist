<?php
include '../autoload.php';
?>

<!DOCTYPE html>
<html>

<head>
    <title>ToDoList | Team Page</title>
    <link rel="stylesheet" type="text/css" href="..\assets\css\resgister.css">
    <style>
        .header {
            background: #FF912A;
        }

        button[name=admin-home-page_btn] {
            background: #FF912A;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Admin - Team Page</h2>
    </div>
    <div class="content">
        <div class="team-goup">
            <?php
            $teams = new TeamManager();
            $teams = $teams->getAll();

            foreach ($teams as $team) {
            ?>
                <form action="./modify_team.php" method="post">
                    <p>
                        <span> <?= $team->name ?> </span>
                    </p>
                    <input type="hidden" name="teamID" value="<?= $team->id ?>">
                    <input type="submit" value="Modifier">
                </form>

            <?php
            }
            ?>

        </div>
    </div>
    <form class="center" method="post" action=".\home.php">
        <div class="input-group">
            <button type="submit" class="btn" name="admin-home-page_btn">Admin Home Page</button>
        </div>
    </form>
</body>

</html>