<?php
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
// Verificar se o ID do curso foi fornecido
if (isset($_GET['id'])) {
    $idCursos = $_GET['id'];

    // Consultar o curso pelo ID
    $query = "SELECT * FROM tbcursos WHERE idCursos = $idCursos";
    $result = $conexao->query($query);

    if ($result->num_rows > 0) {
        $curso = $result->fetch_assoc();
    } else {
        die("Curso não encontrado.");
    }
} else {
    die("ID do curso não fornecido.");
}

// Fechar a conexão
$conexao->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processar o formulário de atualização de curso

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
    $nmCursos = $_POST['nmCursos'];
    $dsPublicoAlvo = $_POST['dsPublicoAlvo'];
    $dsObjetivo = $_POST['dsObjetivo'];
    $vlCursos = $_POST['vlCursos'];

    // Atualizar o curso no banco de dados
    $query = "UPDATE tbcursos SET nmCursos='$nmCursos', dsPublicoAlvo='$dsPublicoAlvo', dsObjetivo='$dsObjetivo', vlCursos='$vlCursos' WHERE idCursos=$idCursos";
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
    <title>Atualizar Curso</title>
</head>
<body>

<h1>Atualizar Curso</h1>

<!-- Formulário de atualização de curso -->
<form method="post" action="">
    <label for="nmCursos">Nome do Curso:</label>
    <input type="text" name="nmCursos" value="<?php echo $curso['nmCursos']; ?>" required>

    <label for="dsPublicoAlvo">Público-Alvo:</label>
    <input type="text" name="dsPublicoAlvo" value="<?php echo $curso['dsPublicoAlvo']; ?>" required>

    <label for="dsObjetivo">Descrição Objetivo:</label>
    <input type="text" name="dsObjetivo" value="<?php echo $curso['dsObjetivo']; ?>" required>

    <label for="vlCursos">Valor do Curso:</label>
    <input type="text" name="vlCursos" value="<?php echo $curso['vlCursos']; ?>" required>

    <button type="submit">Atualizar Curso</button>
</form>

</body>
</html>