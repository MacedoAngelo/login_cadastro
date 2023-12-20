<?php
// Conectar ao banco de dados (substitua com suas credenciais)
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
$port = 3306;

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

session_start();
if (!isset($_SESSION['usuario_id'])) {
    // Se não estiver autenticado, redirecione para a página de login
    header('Location: index.php');
    exit();
}
$usuario_nm = $_SESSION['usuario_nm'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Criar Área</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <header>
        <img class="logo" src="../imagens/LOGO-VITA.png" alt="Grupo Educacional Vita">
        <nav>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav-list">
                <li><a href="../home.php">Inicio</a></li>
                <li><a href="#">Sobre</a></li>
                <li><a href="../cursos/index.php">Cursos</a></li>
                <li><a href="../area/index.php">Áreas</a></li>
                <li><a href="https://wa.link/em4v6y">Contato</a></li>
                <li><a href="../logout.php">Sair</a></li>
            </ul>
            <div id="name_user">
                <h3>Bem-vindo, <?php echo $usuario_nm; ?></h3>
            </div>
        </nav>
    </header>
    <style>
        * {
            margin: 0;
            padding: 0;
            font-family: 'Poppins', sans-serif !important;
        }

        a {

            text-decoration: none;
            transition: 0.3s;
            color: black;
        }

        a:hover {
            opacity: 0.7;
        }

        .logo {
            font-size: 24px;
            text-transform: uppercase;
            letter-spacing: 4px;
            margin-top: 15px;
        }

        nav {
            display: flex;
            justify-content: space-around;
            align-items: center;
            font-family: system-ui, -apple-system, Helvetica, Arial, sans-serif;
            background: #ffffff;
            height: 8vh;
        }

        main {
            background: url("img/AQUI\ NA\ VITAS.png") no-repeat center center;
            background-size: cover;
            background: rgb(150, 213, 254);
            background: linear-gradient(0deg, rgba(150, 213, 254, 1) 0%, rgba(255, 255, 255, 1) 100%);
            height: 92vh;

        }

        .nav-list {
            list-style: none;
            display: flex;
        }

        .nav-list li {
            letter-spacing: 3px;
            margin-left: 32px;
        }

        .mobile-menu {
            display: none;
            cursor: pointer;
        }

        .mobile-menu div {
            width: 32px;
            height: 2px;
            background: #000000;
            margin: 8px;
            transition: 0.3s;
        }

        @media (max-width: 999px) {
            .nav-list {
                position: absolute;
                top: 8vh;
                right: 0;
                width: 100%;
                /* Altere para ocupar a largura total */
                height: auto;
                /* Altura automÃ¡tica com base no conteÃºdo */
                background: #ffffff;
                flex-direction: column;
                align-items: center;
                justify-content: space-around;
                transform: translateX(100%);
                transition: transform 0.3s ease-in;
            }

            .nav-list li {
                margin-left: 0;
                opacity: 0;
                animation: navLinkFade 0.5s ease forwards;
                /* Adicione uma animaÃ§Ã£o de fade-in */
            }

            .mobile-menu {
                display: block;
            }
        }

        .nav-list.active {
            transform: translateX(0);
            opacity: 1;
        }

        @keyframes navLinkFade {
            from {
                opacity: 0;
                transform: translateX(50px);
            }

            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .mobile-menu.active .line1 {
            transform: rotate(-45deg) translate(-8px, 8px);
        }

        .mobile-menu.active .line2 {
            opacity: 0;
        }

        .mobile-menu.active .line3 {
            transform: rotate(45deg) translate(-5px, -7px);
        }

        .foco {
            height: 100%;
            background: url("AQUI NA VITAS.png") no-repeat center;
            background-size: cover;
        }

        .main {
            display: flex;
            justify-content: center;
            margin-top: 25px;
        }

        .card {
            margin: 30px;
            background-color: #eff6f8;
            color: #000000;
            width: 200px;
            height: 250px;
            border-radius: 10px;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
        }

        .card>img {
            width: 100%;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

        .btn {
            font-size: 17px;
            padding: 5px 80px;
            border: none;
            background-color: #96D5FE;
            border-radius: 10px;
            font-weight: 600px;
            transition: 0.5s background;
            cursor: pointer;
        }

        .btn:hover {
            transition: 0.5s background;
            background-color: #e0f7ff;
        }

        .logo {
            position: absolute;
            top: 30px;
            left: 50px;
            transform: translate(-50%, -50%);
            max-width: 100px;
        }

        header {

            padding: 10px;
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
        }

        #search-form {
            margin-top: 15px;
            text-align: center;
        }

        #search-input {
            width: 500px;
        }

        .search {
            width: 22px;
            height: 10px;
        }

        aside {
            float: left;
            position: relative;
            margin-top: 25px;
            width: 20%;
            height: 600px;
            color: #6d8391;
            padding: 10px;
            box-sizing: border-box;
            border-style: solid;
            border-radius: 0 10px 10px 0;
        }

        aside ul {
            text-align: left;
            list-style: disc;
            padding-left: 20px;
        }

        aside li {
            margin-bottom: 5px;
            text-align: left;
        }

        aside h2 {
            text-align: center;
        }

        .vit {
            width: 1304px;
            height: 400px;
        }

        .tes {
            text-align: center;
            margin-top: 30px;
        }

        .container {
            position: relative;
            width: 100%;
            display: flex;
            justify-content: center;
            align-items: center;
            max-width: 1400px;
            flex-wrap: wrap;
            z-index: 1;
        }

        .container .card {
            position: relative;
            align-self: flex-start;
            width: 250px;
            height: 300px;
            margin: 20px;
            box-shadow: 20px 20px 50px rgba(0, 0, 0, 0.5);
            border-radius: 15px;
            background: rgba(255, 255, 255, 0.1);
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: flex-start;
            backdrop-filter: blur(2px);

        }

        .container .card img {
            position: absolute;
            border-radius: 45%;
        }

        .container .card .containt {
            padding: 70px;
            text-align: center;
            transform: translateY(200px);
            transition: 0.9s;
            opacity: 1;
        }

        .container .card:hover .containt {
            transform: translateY(0px);
            opacity: 1;
            background-color: rgba(255, 255, 255, 0.7);
        }

        .container .card .containt h3 {
            font-size: 1em;
            color: #000000;
            z-index: 1;
        }

        .container .card .containt a {
            background: #000000;
            position: relative;
            display: inline-block;
            padding: 8px 20px;
            margin-top: 15px;
            color: #fff;
            text-decoration: none;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.5);
            border-radius: 20px;
            font-weight: 500;
        }

        #name_user {
            position: absolute;
            right: 35px;
            font-family: 'Poppins', sans-serif;
        }


        h1 {
            font-size: 30px;
            color: #fff;
            text-transform: uppercase;
            font-weight: 300;
            text-align: center;
            margin-bottom: 15px;
        }

        table {
            width: 100%;
            table-layout: fixed;
        }

        .tbl-header {
            background-color: rgba(255, 255, 255, 0.3);
        }

        .tbl-content {
            height: 300px;
            overflow-x: auto;
            margin-top: 0px;
            border: 1px solid rgba(255, 255, 255, 0.3);
            height: 50vh;
        }

        th {
            padding: 20px 15px;
            text-align: left;
            font-weight: 500;
            font-size: 12px;
            color: #fff;
            text-transform: uppercase;
        }

        td {
            padding: 15px;
            text-align: left;
            vertical-align: middle;
            font-weight: 300;
            font-size: 12px;
            color: #fff;
            border-bottom: solid 1px rgba(255, 255, 255, 0.1);
        }


        /* demo styles */

        @import url(https://fonts.googleapis.com/css?family=Roboto:400,500,300,700);

        #body {
            background: -webkit-linear-gradient(left, #96d5fe, #59beff);
            background: linear-gradient(to right, #59beff, #96d5fe);
            font-family: 'Roboto', sans-serif;
            height: 100vh;
        }

        section {
            margin: 50px;
        }

        ::-webkit-scrollbar {
            width: 6px;
        }

        ::-webkit-scrollbar-track {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }

        ::-webkit-scrollbar-thumb {
            -webkit-box-shadow: inset 0 0 6px rgba(0, 0, 0, 0.3);
        }

        .edit-icon,
        .del-icon {
            width: 30px;
        }

        *,
        *::after,
        *::before {
            margin: 0;
            padding: 0;
            box-sizing: inherit;
            font-size: 62, 5%;
        }

        .form__label {
            font-family: 'Roboto', sans-serif;
            font-size: 1.2rem;
            margin-top: 0.7rem;
            display: block;
            transition: all 0.3s;
            transform: translateY(0rem);
            margin-left: 40%;

        }

        .form__input {
            font-family: 'Roboto', sans-serif;
            color: #333;
            font-size: 1.2rem;
            margin: 0 auto;
            padding: 1.5rem 2rem;
            border-radius: 0.2rem;
            background-color: rgb(255, 255, 255);
            border: none;
            display: block;
            border-bottom: 0.3rem solid transparent;
            transition: all 0.3s;
            width: 400px;
            margin-top: 40px;
        }

        .form__input:placeholder-shown+.form__label {
            opacity: 0;
            visibility: hidden;
            -webkit-transform: translateY(-4rem);
            transform: translateY(-4rem);
        }

        /* CSS */
        .button-19 {
            appearance: button;
            background-color: #1899D6;
            border: solid transparent;
            border-radius: 16px;
            border-width: 0 0 4px;
            box-sizing: border-box;
            color: #FFFFFF;
            cursor: pointer;
            display: inline-block;
            font-family: din-round, sans-serif;
            font-size: 15px;
            font-weight: 700;
            letter-spacing: .8px;
            line-height: 20px;
            margin: 0;
            outline: none;
            overflow: visible;
            padding: 13px 16px;
            text-align: center;
            text-transform: uppercase;
            touch-action: manipulation;
            transform: translateZ(0);
            transition: filter .2s;
            user-select: none;
            -webkit-user-select: none;
            vertical-align: middle;
            white-space: nowrap;
            width: 200px;
            margin-left: 45%;
        }

        .button-19:after {
            background-clip: padding-box;
            background-color: #1CB0F6;
            border: solid transparent;
            border-radius: 16px;
            border-width: 0 0 4px;
            bottom: -4px;
            content: "";
            left: 0;
            position: absolute;
            right: 0;
            top: 0;
            z-index: -1;
        }

        .button-19:main,
        .button-19:focus {
            user-select: auto;
        }

        .button-19:hover:not(:disabled) {
            filter: brightness(1.1);
            -webkit-filter: brightness(1.1);
        }

        .button-19:disabled {
            cursor: auto;
        }

        .button-19:active {
            border-width: 4px 0 0;
            background: none;
        }

        #body {
            background: -webkit-linear-gradient(left, #96d5fe, #59beff);
            background: linear-gradient(to right, #59beff, #96d5fe);
            font-family: 'Roboto', sans-serif;
            height: 100vh;
            padding-top: 50px;
        }
    </style>
</head>

<body>
    <div id="body">


        <h1>Atualizar Área</h1>

        <!-- Formulário de criação de area -->
        <form method="post" action="">
            <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
            <div class="form__group">
                <input type="text" class="form__input" id="name" placeholder="Nome da área" name="nmArea" value="<?php echo $area['nmArea']; ?>" required="" />
                <label for="name" class="form__label">Nome da área</label>
            </div>
            <br>
            <button class="button-19" role="button" type="submit">Atualizar</button>

        </form>
    </div>
</body>

</html>
