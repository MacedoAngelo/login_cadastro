<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'bdfaculdade';
$port = 3306;

// Conectar ao banco de dados
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName, $port);
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the value of the input field using $_POST
    $nmUsuario = $_POST["nmUsuario"];
    $nmCompletoUsuario = $_POST["nmCompletoUsuario"];
    $emailUsuario = $_POST["emailUsuario"];
    $senhaUsuario = $_POST["senhaUsuario"];

    $query = "INSERT INTO tbusuarios (nmUsuario, nmCompletoUsuario, emailUsuario, senhaUsuario) 
    VALUES ('$nmUsuario', '$nmCompletoUsuario', '$emailUsuario', '$senhaUsuario')";

    if ($conexao->query($query) === TRUE) {
        echo "Registro inserido com sucesso!";
    } else {
        echo "Erro na inserção: " . $conexao->error;
    }
} else {
    // If the form is not submitted, handle accordingly
    echo "Form not submitted!";
}
