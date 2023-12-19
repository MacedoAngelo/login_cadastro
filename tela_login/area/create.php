<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processar o formulário de criação de area

    // Conectar ao banco de dados (substitua com suas credenciais)
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

    // Obter dados do formulário
    $nmArea = $_POST['nmArea'];
    
    // Inserir o area no banco de dados
    $query = "INSERT INTO tbarea (nmArea) VALUES ('$nmArea')";
    $conexao->query($query);

    // Fechar a conexão
    $conexao->close();

    // Redirecionar de volta para a lista de areas
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Área</title>
</head>
<body>

<h1>Criar Área</h1>

<!-- Formulário de criação de area -->
<form method="post" action="">
    <label for="nmArea">Nome da Área:</label>
    <input type="text" name="nmArea" required>

    <button type="submit">Criar Área</button>
</form>

</body>
</html>
