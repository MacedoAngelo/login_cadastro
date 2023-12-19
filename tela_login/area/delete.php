<?php
$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'bdfaculdade';
$port = 3307;

// Conectar ao banco de dados
$conexao = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName, $port);
if ($conexao->connect_error) {
    die("Erro na conexão: " . $conexao->connect_error);
}

// Verificar se o ID do area foi fornecido
if (isset($_GET['id'])) {
    $idArea = $_GET['id'];

    // Excluir o area do banco de dados
    $query = "DELETE FROM tbarea WHERE idArea = $idArea";
    $conexao->query($query);

    // Fechar a conexão
    $conexao->close();

    // Redirecionar de volta para a lista de areas
    header('Location: index.php');
    exit();
} else {
    die("ID do area não fornecido.");
}
?>
