<?php
include '../autoload.php';

if (!isLoggedIn()) {
    $_SESSION['msg'] = "Vous devez vous connectez avant :)";
    header('location: login.php');
}
$todoManager = new TodoManager();

if (isset($_POST['text'])) {
    $todo = $todoManager->add(getCurrentUserID(), $_POST['state'], $_POST['text'], 0);
    unset($_POST);
}

$todos = $todoManager->getAll();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/resgister.css">
    <link rel="stylesheet" href="../assets/css/trello.css">
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script type="text/javascript" src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/45226/dragula.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>MyTrello</title>
    <style>
        button[name=add_todo] {
            background: #fb7d44;
        }

        button[name=add_doing] {
            background: #2a92bf;
        }

        button[name=add_done] {
            background: #00b961;
        }

        form,
        .content {
            width: 100%;
            margin: 0px auto;
            padding: 10px;
            border: none;
            background: none;
        }
    </style>
</head>

<body>
    <div class="layer"></div>
    <div class="popin">
        <form action="../treatment/registerTodo.php" method="post">
            <label for="text">Texte</label>
            <textarea name="text" id="text"></textarea>
            <label for="state">Status</label>
            <select name="state" id="state">
                <option value="todo">TODO</option>
                <option value="doing">DOING</option>
                <option value="done">DONE</option>
            </select>
            <input type="submit" value="Save">
        </form>
        <button class="popin-toggle">x</button>
    </div>

    <div class="popin-comment">
        Comments
        <div class="comments-area">

        </div>
        <form id="comment-form">
            <input type="text" id="comment-content" name="comment-content" placeholder="Your comment">
            <input type="submit">
        </form>
        <button class="popin-comment-toggle">x</button>
    </div>

    <form method="post" action="../treatment/updateTodo.php" class="drag-container" id="dragContainer">
        <ul class="drag-list">
            <li class="drag-column drag-column-on-hold">
                <span class="drag-column-header">
                    <h2>Todo</h2>
                </span>
                <div class="drag-options" id="options1"></div>
                <ul class="drag-inner-list" id="1" data-status="todo">
                    <?php foreach ($todos as $todo) :;
                        if ($todo->state == 'todo') : ?>
                            <li class="drag-item">
                                <input type="hidden" name='<?= $todo->id ?>' value="<?= $todo->state ?>">
                                <span>
                                    <?= $todo->text ?>
                                </span>
                            </li>
                    <?php endif;
                    endforeach; ?>
                </ul>
                <div>
                    <button class="popin-toggle btn" name="add_todo">Add Card</button>
                </div>
            </li>
            <li class="drag-column drag-column-in-progress">
                <span class="drag-column-header">
                    <h2>Doing</h2>
                </span>
                <div class="drag-options" id="options2"></div>
                <ul class="drag-inner-list" id="2" data-status="doing">
                    <?php foreach ($todos as $todo) :;
                        if ($todo->state == 'doing') : ?>
                            <li class="drag-item">
                                <input type="hidden" name='<?= $todo->id ?>' value="<?= $todo->state ?>">
                                <span>
                                    <?= $todo->text ?>
                                </span>
                            </li>
                    <?php endif;
                    endforeach; ?>
                </ul>
                <div>
                    <button class="popin-toggle btn" name="add_doing">Add Card</button>
                </div>
            </li>
            <li class="drag-column drag-column-approved">
                <span class="drag-column-header">
                    <h2>Done</h2>
                </span>
                <div class="drag-options" id="options3"></div>
                <ul class="drag-inner-list" id="3" data-status="done">
                    <?php foreach ($todos as $todo) :;
                        if ($todo->state == 'done') : ?>
                            <li class="drag-item">
                                <input type="hidden" name='<?= $todo->id ?>' value="<?= $todo->state ?>">
                                <span>
                                    <?= $todo->text ?>
                                </span>
                            </li>
                    <?php endif;
                    endforeach; ?>
                </ul>
                <div>
                    <button class="popin-toggle btn" name="add_done">Add Card</button>
                </div>
            </li>
        </ul>
    </form>

    <script src="../assets/js/drag.js"></script>
    <script src="../assets/js/trello.js"></script>
</body>

</html>