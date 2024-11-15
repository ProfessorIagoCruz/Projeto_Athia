<?php
// config.php

$host = 'localhost';
$dbname = 'projetoathia';
$username = 'root'; 
$password = ''; 
$conn = new mysqli($host, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Erro na conexão: " . $conn->connect_error);
}
?>
