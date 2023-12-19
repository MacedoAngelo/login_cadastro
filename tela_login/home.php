<?php
// Inicie a sessão (se ainda não estiver iniciada)
session_start();

//Verifique se o usuário está autenticado
if (!isset($_SESSION['usuario_id'])) {
    // Se não estiver autenticado, redirecione para a página de login
    header('Location: index.php');
    exit();
}

//Se chegou até aqui, o usuário está autenticado
$usuario_id = $_SESSION['usuario_id'];
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Home</title>
</head>
<body>

<h1>Bem-vindo à Área Restrita, Usuário ID: <?php echo $usuario_id; ?></h1>

<p>Escolha uma opção:</p>

<!-- Botão para redirecionar para CRUD 1 -->
<form action="cursos/index.php" method="get">
    <button type="submit">Cursos</button>
</form>

<!-- Botão para redirecionar para CRUD 2 -->
<form action="area/index.php" method="get">
    <button type="submit">Área</button>
</form>

<!-- Link para fazer logout -->
<br><a href="logout.php">Logout</a>

</body>
</html>
