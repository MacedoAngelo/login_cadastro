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
// Verificar se o ID do area foi fornecido
if (isset($_GET['id'])) {
    $idArea = $_GET['id'];

    // Consultar o area pelo ID
    $query = "SELECT * FROM tbarea WHERE idArea = $idArea";
    $result = $conexao->query($query);

    if ($result->num_rows > 0) {
        $area = $result->fetch_assoc();
    } else {
        die("Área não encontrada.");
    }
} else {
    die("ID da área não fornecido.");
}

// Fechar a conexão
$conexao->close();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Processar o formulário de atualização de area

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
    
    // Atualizar o area no banco de dados
    $query = "UPDATE tbarea SET nmArea='$nmArea' WHERE idArea=$idArea";
    $conexao->query($query);

    // Fechar a conexão
    $conexao->close();

    // Redirecionar de volta para a lista de area
    header('Location: index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atualizar Área</title>
</head>
<body>

<h1>Atualizar Área</h1>

<!-- Formulário de atualização de area -->
<form method="post" action="">
    <label for="nmArea">Nome da Área:</label>
    <input type="text" name="nmArea" value="<?php echo $area['nmArea']; ?>" required>

    <button type="submit">Atualizar Área</button>
</form>

</body>
</html>