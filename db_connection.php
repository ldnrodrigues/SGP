<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "sgp_database";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $database);

// Verifica a conexão
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
