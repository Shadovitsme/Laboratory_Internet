<?php

namespace data;

require_once('db.php');

use database\dbFunctions;

switch ($_POST['function']) {
    case 'registrate':
        registrate($_POST['login'], $_POST['password']);
        break;
}

function registrate($login, $password)
{
    $query = "INSERT INTO user (login, password) VALUES ('$login', '$password')";
    dbFunctions::db($query);
}
