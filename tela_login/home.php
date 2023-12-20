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
$usuario_nm = $_SESSION['usuario_nm'];
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página Home</title>
</head>
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
</style>

<body>
    <header>
        <img class="logo" src="imagens/LOGO-VITA.png" alt="Grupo Educacional Vita">
        <nav>
            <div class="mobile-menu">
                <div class="line1"></div>
                <div class="line2"></div>
                <div class="line3"></div>
            </div>
            <ul class="nav-list">
                <li><a href="#">Sobre</a></li>
                <li><a href="cursos/index.php">Cursos</a></li>
                <li><a href="area/index.php">Áreas</a></li>
                <li><a href="https://wa.link/em4v6y">Contato</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
            <div id="name_user">
                <h3>Bem-vindo, <?php echo $usuario_nm; ?></h3>
            </div>
        </nav>
    </header>
    <!-- <header>
        <h1>Bem-vindo, <?php echo $usuario_nm; ?></h1>
        <form action="cursos/index.php" method="get">
            <button type="submit">Cursos</button>
        </form>
        <form action="area/index.php" method="get">
            <button type="submit">Área</button>
        </form>
        <a href="logout.php">Logout</a>
    </header> -->
    <section class="foco">
        <img src="imagens/AQUI NA VITAS.png" alt="Aqui na Vita é o lugar da sua pós-graduação">
    </section>

    <form id="search-form">
        <input type="text" id="searchInput" oninput="filterCards()" placeholder="Pesquisar">
    </form>

    <div class="main">
        <aside>
            <h2>CURSOS</h2>
            <ul>
                <li><a href="Cursos1">Design Thinking e Inovação</a></li>
                <li><a href="Cursos2">Engenharia de Software Moderna</a></li>
                <!-- Adicione mais cursos conforme necessário -->
            </ul>
        </aside>

        <div class="container">
            <!-- Adicione mais cards conforme necessário -->
        </div>
    </div>
    <!-- Link para fazer logout -->
    <!-- <br><a href="logout.php">Logout</a> -->

</body>

</html>