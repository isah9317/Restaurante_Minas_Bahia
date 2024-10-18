<?php
session_start(); // Inicia a sessão

// Verifica se o usuário está logado
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    // Destrói a sessão
    session_unset(); // Remove todas as variáveis da sessão
    session_destroy(); // Destrói a sessão
}

// Redireciona para a página de login ou página inicial
header("Location: login.html"); // Altere para o caminho desejado
exit;
?>
