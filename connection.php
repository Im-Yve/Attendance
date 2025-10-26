<?php

$localhost = 'localhost';
$username = 'root';
$password = '';
$db_name = 'student_attendance';

$conn = new mysqli($localhost, $username, $password, $db_name);

if ($conn->connect_error) {
    die("Connection Failed" . $conn->connect_error);
}

?>