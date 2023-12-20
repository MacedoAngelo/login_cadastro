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

// Verificar se o ID do curso foi fornecido
if (isset($_GET['id'])) {
    $idCursos = $_GET['id'];

    // Excluir o curso do banco de dados
    $query = "DELETE FROM tbcursos WHERE idCursos = $idCursos";
    $conexao->query($query);

    // Fechar a conexão
    $conexao->close();

    // Redirecionar de volta para a lista de cursos
    header('Location: index.php');
    exit();
} else {
    die("ID do curso não fornecido.");
}
?>
