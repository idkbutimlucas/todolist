<?php

function display_error()
{
    global $errors;

    if (isset($errors) && count($errors) > 0) {
        echo '<div class="error">';
        foreach ($errors as $error) {
            echo $error . '<br>';
        }
        echo '</div>';
    }
}

function isLoggedIn()
{
    if (isset($_SESSION['current_user'])) {
        return true;
    } else {
        return false;
    }
}

function isAdmin()
{
    if (isset($_SESSION['current_user']) && $_SESSION['current_user']->user_type == 'admin') {
        return true;
    } else {
        return false;
    }
}

function getCurrentUsername()
{
    if (isLoggedIn()) {
        return $_SESSION['current_user']->username;
    }
    return false;
}

function getCurrentUserType()
{
    if (isLoggedIn()) {
        return $_SESSION['current_user']->user_type;
    }
    return false;
}



function getCurrentUserID()
{
    if (isLoggedIn()) {
        return $_SESSION['current_user']->id;
    }
    return false;
}


