<?php
$host = "localhost";
$database = "mysql";
$user = "user";
$password = "";

$mysqli = mysqli_connect($host, $user, $password, $database);
if(mysqli_connect_errno()){
    die('Ошибка подключения в БД' .mysqli_connect_error());
}