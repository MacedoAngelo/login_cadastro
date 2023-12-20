
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login e Cadastro</title>
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="imagens/" type="image/x-icon">
    
    
</head>
<body>

<?php

$dbHost = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'bdfaculdade';
$port = 3306;

$conexao = new Mysqli($dbHost, $dbUsername, $dbPassword, $dbName, $port);
if ($conexao->connect_error) {
    echo "Erro na conexão: " . $conexao->connect_error;
} else {
    // echo "Conexão efetuada com sucesso";

    // // Executar uma consulta SELECT
    // $query = "SELECT * FROM tbusuarios";
    // $result = $conexao->query($query);

    // // Verificar se a consulta foi bem-sucedida
    // if ($result) {
    //     // Processar os resultados
    //     while ($row = $result->fetch_assoc()) {
    //         // Fazer algo com cada linha de resultado
    //         echo "ID: " . $row['idUsuario'] . " Nome: " . $row['nmUsuario'] . "<br>";
    //     }

    //     // Liberar os recursos do resultado
    //     $result->free();
    // } else {
    //     // Se a consulta falhar
    //     echo 'Erro na consulta: ' . $conexao->error;
    // }

    // Fechar a conexão
    $conexao->close();
}
?>


<div class="container">
    <div class="welcome-box">
        <h2>Bem-vindo(a)</h2>
        <p><img src="imagens/Design sem nome.png" width="200px" ></p>
    <div class="tabs">
        <div class="tab tab-login" onclick="openTab('login')">Login</div>
        <div class="tab tab-register" onclick="openTab('register')">Cadastro</div>
    </div>
    </div>
    <div class="form-wrap" id="login-form">
        <form method="post" action="login.php">
            <input type="text" name="loginUsuario" placeholder="Nome de usuário" required>
            <input type="password" name="senhaUsuario" placeholder="Senha" required>
            <button type="submit">Entrar</button>
        </form>
    </div>
    <div class="form-wrap hidden" id="register-form">
        <form method="post" action="create_form.php">
            <input type="text" id="nmUsuario" name="nmUsuario" placeholder="Nome de usuário" required>
            <input type="text"  id="nmCompletoUsuario" name="nmCompletoUsuario"placeholder="Nome Completo" required>
            <input type="email" id="emailUsuario" name="emailUsuario" placeholder="Email" required>
            <input type="password" id="senhaUsuario" name="senhaUsuario" placeholder="Senha" required>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>

<script>
    function openTab(tabName) {
        var loginForm = document.getElementById('login-form');
        var registerForm = document.getElementById('register-form');

        if (tabName === 'login') {
            loginForm.classList.remove('hidden');
            registerForm.classList.add('hidden');
        } else {
            loginForm.classList.add('hidden');
            registerForm.classList.remove('hidden');
        }
    }

</script>

</body>
</html>
