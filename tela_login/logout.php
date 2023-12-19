<?php
// Iniciar ou retomar a sessão
session_start();

// Destruir a sessão (fazer logout)
session_destroy();

// Redirecionar para a página de login
header('Location: index.php');
exit();
?>
