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

// Consulta para obter todos os area
$query = "SELECT * FROM tbarea";
$result = $conexao->query($query);

// Fechar a conexão
$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Áreas</title>
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
<br><a href="../home.php">Home</a>
<br><a href="create.php">Criar novo</a>
<h1>Lista de Áreas</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome da Área</th>
            <th> - </th>
            <th> - </th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Exibir a lista de area na tabela
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['idArea'] . "</td>";
                echo "<td>" . $row['nmArea'] . "</td>";
                echo "<td><a href='update.php?id=" . $row['idArea'] . "'>Editar</a></td>";
                echo "<td><a href='delete.php?id=" . $row['idArea'] . "'>Deletar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Nenhuma area encontrado.</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
