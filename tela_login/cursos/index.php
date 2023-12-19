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

// Consulta para obter todos os cursos
$query = "SELECT * FROM tbcursos";
$result = $conexao->query($query);

// Fechar a conexão
$conexao->close();
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Cursos</title>
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
<h1>Lista de Cursos</h1>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Nome do Curso</th>
            <th>Público-Alvo</th>
            <th>Desc. Objetivo</th>
            <th>Valor do Curso</th>
            <th> - </th>
            <th> - </th>
        </tr>
    </thead>
    <tbody>
        <?php
        // Exibir a lista de cursos na tabela
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row['idCursos'] . "</td>";
                echo "<td>" . $row['nmCursos'] . "</td>";
                echo "<td>" . $row['dsPublicoAlvo'] . "</td>";
                echo "<td>" . $row['dsObjetivo'] . "</td>";
                echo "<td>" . $row['vlCursos'] . "</td>";
                echo "<td><a href='update.php?id=" . $row['idCursos'] . "'>Editar</a></td>";
                echo "<td><a href='delete.php?id=" . $row['idCursos'] . "'>Deletar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>Nenhum curso encontrado.</td></tr>";
        }
        ?>
    </tbody>
</table>

</body>
</html>
