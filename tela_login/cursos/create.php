<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processar o formulário de criação de curso

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
    $nomeCurso = $_POST['nmCursos'];
    $publicoAlvo = $_POST['dsPublicoAlvo'];
    $dsObjetivo = $_POST['dsObjetivo'];
    $valorCurso = $_POST['vlCursos'];

    // Inserir o curso no banco de dados
    $query = "INSERT INTO tbcursos (nmCursos, dsPublicoAlvo,dsObjetivo, vlCursos) VALUES ('$nomeCurso', '$publicoAlvo', '$dsObjetivo', '$valorCurso')";
    $conexao->query($query);

    // Fechar a conexão
    $conexao->close();

    // Redirecionar de volta para a lista de cursos
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Curso</title>
</head>
<body>

<h1>Criar Curso</h1>

<!-- Formulário de criação de curso -->
<form method="post" action="">
    <label for="nmCurso">Nome do Curso:</label>
    <input type="text" name="nmCursos" required>

    <label for="dsPublicoAlvo">Público Alvo:</label>
    <input type="text" name="dsPublicoAlvo" required>

    <label for="dsObjetivo">Descrição Objetivo:</label>
    <input type="text" name="dsObjetivo" required>

    <label for="vlCurso">Valor do Curso:</label>
    <input type="text" name="vlCursos" required>

    <button type="submit">Criar Curso</button>
</form>

</body>
</html>
