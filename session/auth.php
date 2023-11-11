<?php
session_start();

$usuarioValido = 'unicid';
$senhaValida = 'unicid123';

if (isset($_POST['username']) && isset($_POST['password'])) {
    $usuarioInserido = $_POST['username'];
    $senhaInserida = $_POST['password'];

    if ($usuarioInserido === $usuarioValido && $senhaInserida === $senhaValida) {
        $_SESSION['usuario_logado'] = true; // Defina uma variável de sessão para indicar que o usuário está logado
        header('Location: ../index.php'); // Redireciona para a página restrita
        exit();
    } else {
        // Defina uma variável de sessão para a mensagem de erro
        $_SESSION['erro_login'] = "Credenciais inválidas. Tente novamente.";
        header('Location: ../index.php');
        exit();
    }
}
?>
