<?php

$server = "127.0.0.1";
$database = "KbrTec";
$user = "root";
$pass = "";

$mysqli = new mysqli($server, $user, $pass, $database);
$conection = mysqli_connect($server, $user, $pass, $database);

//Checando conexão
if($conection->connect_error) {
    die("Conection failed: ");
}
