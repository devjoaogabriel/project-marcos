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
        <div class="wrap-section">
            <div class="wrap-header">
                <span class="wrap-title">
                    CONMEBOL Libertadores
                </span>
            </div>
            <hr>
            <div class="wrap-content">
                <p><b>Introdução:</b><br> A CONMEBOL Libertadores, também conhecida como Copa Libertadores da América, é a principal competição de clubes de futebol da América do Sul. Ela teve início em 1960 e, desde então, se tornou uma das competições de clubes mais prestigiadas do mundo.</p>
                <br>
                <p><b>Origens:</b><br> A ideia de criar a Copa Libertadores surgiu em 1958, quando o então presidente da CONMEBOL, José Ramos de Freitas, propôs um torneio internacional de clubes para comemorar o centenário da independência dos países sul-americanos. A primeira edição da competição ocorreu em 1960, e o Club Atlético Independiente, da Argentina, foi o vencedor inaugural.</p>
                <br>
                <p><b>Formato da Competição:</b><br> A competição foi inicialmente disputada por clubes convidados dos países membros da CONMEBOL, mas logo se estabeleceu como um torneio anual. A CONMEBOL Libertadores adota um formato de torneio de eliminatórias, semelhante à Liga dos Campeões da UEFA, com fases de grupos e mata-matas.</p>
                <br>
                <p><b>Clubes de Destaque:</b><br> Ao longo dos anos, a competição viu alguns dos maiores clubes sul-americanos competindo por glória continental. Clubes como Boca Juniors e River Plate, da Argentina, Peñarol e Nacional, do Uruguai, e Flamengo e Santos, do Brasil, se destacaram na história da competição.</p>
                <br>
                <p><b>Rivalidades Intensas:</b><br> A CONMEBOL Libertadores também testemunhou algumas das rivalidades mais intensas do futebol, como o superclássico argentino entre Boca Juniors e River Plate e o clássico uruguaio entre Peñarol e Nacional. Estas partidas são frequentemente acompanhadas por milhões de fãs em toda a América do Sul e além.</p>
                <br>
                <p><b>Recompensas:</b><br> O vencedor da CONMEBOL Libertadores ganha o direito de representar a América do Sul na Copa do Mundo de Clubes da FIFA, onde compete com os melhores clubes de outros continentes.</p>
                <br>
                <p><b>Conclusão:</b><br> A competição evoluiu ao longo dos anos, com mudanças nas regras e formatos, mas manteve sua importância e relevância no mundo do futebol. A CONMEBOL Libertadores é mais do que um torneio de futebol; é uma celebração da paixão e da cultura do futebol na América do Sul.</p>
            </div>
        </div>
    </div>
</body>
</html>