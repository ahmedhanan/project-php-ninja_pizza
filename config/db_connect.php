<?php
// connect to db
$ini = parse_ini_file('config.ini');
$username = $ini['db_user'];
$password = $ini['db_password'];
$db_name = $ini['db_name'];
$conn = mysqli_connect('localhost', $username, $password, $db_name);

// check if connection is successful
if(!$conn) {
    echo "DB Connection Error" . mysqli_connect_error();
};

