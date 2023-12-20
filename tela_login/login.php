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

session_start();
// Verificar se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obter os dados do formulário
    $loginUsuario = $_POST['loginUsuario'];
    $senhaUsuario = $_POST['senhaUsuario'];

    // Preparar e executar a consulta de seleção
    $query = "SELECT * FROM tbusuarios WHERE nmUsuario = '$loginUsuario'";
    $result = $conexao->query($query);

    if ($result && $result->num_rows > 0) {
        // Usuário encontrado, verificar a senha
        $row = $result->fetch_assoc();
        
        if (password_verify($senhaUsuario, password_hash($row['senhaUsuario'], PASSWORD_DEFAULT) )) {
            $_SESSION['usuario_id'] = $row['idUsuario'];
            $_SESSION['usuario_nm'] = $row['nmUsuario'];
            header('Location: home.php');

            // exit();
            // echo "Login bem-sucedido! Bem-vindo, " . $row['nmCompletoUsuario'];
        } else {
            echo "Senha incorreta.";
        }
    } else {
        echo "Usuário não encontrado.";
    }
} else {
    // Redirecionar ou lidar com situação não esperada
    echo "Erro: Este script deve ser acessado por meio do formulário de login.";
}

// Fechar a conexão
$conexao->close();

?>
