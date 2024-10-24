<?php

namespace data;

require_once('db.php');

use database\dbFunctions;

switch ($_POST['function']) {
    case 'registrate':
        registrate($_POST['login'], $_POST['password']);
        break;
    case 'update':
        var_dump($_POST);
        update($_POST['id'], $_POST['login'], $_POST['password']);
        break;
}

function registrate($login, $password)
{
    $query = "INSERT INTO user (login, password) VALUES ('$login', '$password')";
    dbFunctions::db($query);
}

function update($id, $login, $password)
{
    if (!empty($login) && !empty($login)) {
        $query = "UPDATE user SET login = '$login', password = '$password' WHERE id = '$id'";
        dbFunctions::db($query);
    } elseif (!empty($login)) {
        $query = "UPDATE user SET login = '$login' WHERE id = '$id'";
        dbFunctions::db($query);
    } else {
        $query = "UPDATE user SET password = '$password' WHERE id = '$id'";
        dbFunctions::db($query);
    }
}
