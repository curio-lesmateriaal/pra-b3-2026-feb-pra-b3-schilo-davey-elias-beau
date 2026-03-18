<?php

$host = 'localhost';
$dbname = 'takenlijst';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die('Databaseverbinding mislukt: ' . $conn->connect_error);
}