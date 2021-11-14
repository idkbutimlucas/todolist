<?php
include '..\autoload.php';
?>
<?php
$teamID = $_POST['teamID'];

if (isset($_POST['name'])) {
    $teamManager = new TeamManager();
    $teamToModify = new Team($teamID, $_POST['name']);
    $teamManager->update($teamToModify);
}

$teamManager = new TeamManager();
$team = $teamManager->get($teamID);
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

        button[name=delet_btn],
        button[name=modify_btn],
        button[name=liste-team_btn] {
            background: #FF912A;
        }
    </style>
</head>

<body>
    <div class="header">
        <h2>Modify</h2>
    </div>

    <form class="content" method="post" action="modify_team.php">
        <input type="hidden" name="teamID" value="<?= $team->id ?>">
        <div class="input-group">
            <label>name</label>
            <input type="text" name="name" value="<?= $team->name ?>">
        </div>
        <div class="input-group">
            <button type="submit" class="btn" name="modify_btn">Modify</button>
        </div>
    </form>
    <form method="post" action=".\listeTeam.php">
        <div class="input-group">
            <button type="submit" class="btn" name="liste-team_btn">Liste Team</button>
        </div>
    </form>
</body>

</html>