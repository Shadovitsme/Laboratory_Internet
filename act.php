<?php
// переделать дататайп в жсон
// рестапи требует получать много инфы из адресной строки
namespace data;

require_once('db.php');

use database\dbFunctions;

switch ($_POST['function']) {
    case 'registrate':
        registrate($_POST['login'], $_POST['password']);
        break;
    case 'update':
        update($_POST['id'], $_POST['login'], $_POST['password']);
        break;
    case 'delete':
        delete($_POST['login']);
        break;
    case 'login':
        login($_POST['login'], $_POST['password']);
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

function delete($login)
{
    $query = "DELETE FROM user where login = '$login'";
    dbFunctions::db($query);
}
function login($login, $password)
{
    $query = "select id from user where login = '$login' and password = '$password'";
    $queryResult = dbFunctions::db($query);
    foreach ($queryResult as $Res) {
        echo ($Res);
    }
    if (!empty(dbFunctions::db($query))) {
        echo 'Enter!';
    } else {
        echo 'No such user';
    }
}