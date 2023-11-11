<?php
session_start();

if (!isset($_SESSION['usuario_logado']) || $_SESSION['usuario_logado'] !== true) {
    // Defina uma variável de sessão para a mensagem de erro
    $_SESSION['erro_login'] = "Credenciais inválidas. Tente novamente.";
    header('Location: ../index.php');
    exit();
}    

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $email = $_POST["email"];
    $mensagem = $_POST["mensagem"];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Mensagem Enviada!</title>
</head>
<body>
    <div class="main-content">
        <div class="wrap-section">
            <div class="wrap-header">
                <span class="wrap-title">
                    Muito obrigado!
                </span>
            </div>
            <hr>
            <div class="wrap-content">
                <div id="mensagem">
                    <div class="mensagem-enviada">
                        <p>Obrigado, <?php echo $nome; ?>!</p>
                        <p>Sua mensagem foi enviada com sucesso:</p>
                        <p><strong>Nome:</strong> <?php echo $nome; ?></p>
                        <p><strong>Email:</strong> <?php echo $email; ?></p>
                        <p><strong>Mensagem:</strong> <?php echo $mensagem; ?></p>
                    </div>
                </div>
                <button><a href="../index.php">Página Inicial</a></button>
            </div>
        </div>
    </div>
</body>
</html>
