<?php

namespace data;

require_once('db.php');

use database\dbFunctions;

$query = "INSERT INTO user (login, password) VALUES ('test', 'test')";
echo dbFunctions::db($query);
