<?php
session_start();

if (!isset($_SESSION['usuario_logado']) || $_SESSION['usuario_logado'] !== true) {
    // Defina uma variável de sessão para a mensagem de erro
    $_SESSION['erro_login'] = "Credenciais inválidas. Tente novamente.";
    header('Location: ../index.php');
    exit();
}

$nomeDaPagina = pathinfo($_SERVER['PHP_SELF'], PATHINFO_FILENAME);

if (isset($_SESSION['usuario_logado'])) {
    $username = $_SESSION['username'];
    $usermail = $_SESSION['usermail'];
} else {
    echo "A variável não está definida.";
}

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style.css">
    <title>Ranking Libertadores</title>
</head>
<body>
    <div class="nav-bar">
        <div class="user-info">
            <div class="profile-img"></div>
            <div class="user-name">
                <span>Usuário</span>
                <?php echo $username; ?>
            </div>
            <div class="user-mail">
                <span>E-mail</span>
                <?php echo $usermail; ?>
            </div>
            <div class="logout">
                <button><a href="../session/logout.php">Sair</a></button>
            </div>
            <hr>
            <ul>
                <li><a href="../index.php">Página Inicial</a></li>
                <li><a href="estatisticas.php">Estatísticas</a></li>
                <li><a href="conmebol.php">História</a></li>
                <li><a href="contatos.php">Contatos</a></li>
                <li><a href="sobre.php">Sobre</a></li>
            </ul>
        </div>
    </div>
    <div class="main-content">
        <div class="wrap-section-banner">
            <div class="banner-title">
                Deseja nos enviar uma mensagem? <span>Preencha o formulário.</span>
            </div>
            <span>Nos escreva! Envie sugestões, solicitações de revisões de dados caso incorretos, esperamos você!</span>
        </div>
        <div class="wrap-section">
            <div class="wrap-header">
                <span class="wrap-title">
                    Preencha todos os campos
                </span>
            </div>
            <hr>
            <div class="wrap-content">
                <form id="formContato" action="../actions/messageAction.php" method="post" onsubmit="mostrarMensagemDeEnvio(this); return false;">
                    <label for="nome">Nome:</label>
                    <input type="text" id="nome" name="nome" required>
                    
                    <label for="email">E-mail:</label>
                    <input type="email" id="email" name="email" required>
                    
                    <label for="mensagem">Mensagem:</label>
                    <textarea id="mensagem" name="mensagem" rows="4" required></textarea>
                    
                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>
    </div>
</body>
</html>