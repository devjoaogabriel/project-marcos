<?php 
session_start();

$username = "Palm Eirasnão Temmundial";
$usermail = "unicid_php@gmail.com";

$usuarioLogado = false;

if (isset($_SESSION['usuario_logado']) && $_SESSION['usuario_logado'] === true) {
    $usuarioLogado = true;
}

$_SESSION['username'] = $username;
$_SESSION['usermail'] = $usermail;

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Ranking Libertadores</title>
</head>
<body>
    <div id="modal-erro" class="modal">
        <div class="modal-content">
            <span class="close" id="fechar-modal">&times;</span>
            <p id="mensagem-erro">
            </p>
            <p id="mensagem-login">Está é uma página para meu trabalho da Unicid sobre PHP, 
                se estiver tentando fazer login use essas credenciais: <span>Usuário:</span> <b>unicid</b> <span>Senha:</span> <b>unicid123</b> </p>
        </div>
    </div>
    <div class="nav-bar">
    <?php if ($usuarioLogado): ?>
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
                <button><a href="session/logout.php">Sair</a></button>
            </div>
            <hr>
            <ul>
                <li><a href="index.php">Página Inicial</a></li>
                <li><a href="pages/estatisticas.php">Estatísticas</a></li>
                <li><a href="pages/conmebol.php">História</a></li>
                <li><a href="pages/contatos.php">Contatos</a></li>
                <li><a href="pages/sobre.php">Sobre</a></li>
            </ul>
        </div>
    <?php else: ?>
        <div class="login-content">
            <div class="login-text">
                <span>Entre</span> com sua conta e tenha <span>acesso</span> ao conteúdo <span>completo!</span>
            </div>
            <form action="session/auth.php" method="post">
                <div class="wrap-form-section">
                    <label for="username">Usuário</label>
                    <input type="text" id="username" name="username" placeholder="unicid" value="unicid" required><br>
                </div>
                <div class="wrap-form-section">
                    <label for="password">Senha</label>
                    <input type="password" id="password" name="password" placeholder="unicid123" value="unicid123" required><br>
                </div>
                <div class="wrap-form-section">
                    <input type="submit" value="Entrar">
                </div>
            </form>
        </div>
    <?php endif; ?>
    </div>
    <div class="main-content">
        <div class="wrap-section-banner">
            <div class="banner-title">
                Encontre aqui informações sobre a <span>CONMEBOL Libertadores</span>
            </div>
            <span>Esteja sempre antenado no mundo do futebol, na liga e torça para o seu time favorito!</span>
        </div>
        <div class="wrap-section">
            <div class="wrap-header">
                <span class="wrap-title">
                    Estatísticas
                </span>
            </div>
            <hr>
            <div class="wrap-content">
                Acompanhe em tempo real todas as notícias e dados sobre a Libertadores
            </div>
        </div>
        <div class="wrap-section-banner">
            <div class="banner-title">
                Acompanhe seu jogador favorito
            </div>
        </div>
        <div class="wrap-section">
            <div class="wrap-header">
                <span class="wrap-title">
                    É fã de carteirinha?
                </span>
            </div>
            <hr>
            <div class="wrap-content">
                Acompanhe seu jogador favorito, seus marcos, conquistas e como contribui para o cenário mundial do futebol!
            </div>
        </div>
        <div class="wrap-section-banner">
            <div class="banner-title">
                Ainda <span>não</span> tem uma conta?
            </div>
            <span>Crie agora mesmo o seu acesso e não perca mais tempo!</span>
        </div>
    </div>
</body>
</html>

<script>
  <?php
  if (isset($_SESSION['erro_login'])) {
    echo "document.getElementById('modal-erro').style.display = 'flex';";
    echo "document.getElementById('mensagem-erro').style.display = 'flex';";
    echo "document.getElementById('mensagem-erro').innerHTML = '{$_SESSION['erro_login']}';";
    unset($_SESSION['erro_login']);
  }
  ?>

  document.getElementById('fechar-modal').addEventListener('click', function() {
    document.getElementById('modal-erro').style.display = 'none';
  });
</script>
