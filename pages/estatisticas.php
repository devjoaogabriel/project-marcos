<?php
session_start();
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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

include('../data/libertadores.php');

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
            <div class="profile-img">
                <div class="profile-placeholder"></div>
            </div>
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
                Acompanhe por aqui as estatíscas da <span>CONMEBOL LIBERTADORES</span>
            </div>
            <span id="habilitar-notificacoes">Ative as notificações e receba diariamente as nossas notícias!</span>
        </div>
        <div class="wrap-section">
            <div class="wrap-header">
                <span class="wrap-title">
                    Ranking Top 10
                </span>
            </div>
            <hr>
            <div class="wrap-content">
                <p>Veja quais são os times que estão no <span>ranking top 10</span> de títulos ganhos da libertadores</p>
                <div class="card">
                    <div class="card-ranking"></div>
                    <div class="card-time-img">
                        <?php 
                            $img = $times[0]['img'];
                            echo "<img src=\"$img\">";
                        ?>
                    </div>
                    <div class="card-time-info">
                        <div class="card-info-section">
                        <div class="wrap-info">
                                <div class="info-title">Time</div>
                                <div class="card-time-nome"><?php echo $times[0]['nome']; ?></div>
                            </div>
                            <div class="wrap-info">
                                <div class="info-title">País</div>
                                <div class="card-time-bandeira"><?php echo $times[0]['bandeira']; ?></div>
                            </div>
                            <div class="wrap-info">
                                <div class="info-title">Títulos (anos)</div>
                                <div class="card-time-titulos"><?php echo implode(', ', $times[0]['anos_títulos']) ; ?></div>
                            </div>
                        </div>
                        <div class="card-desc">
                            <div class="info-title">Sobre o time</div>
                            <div class="card-time-desc"><?php echo $times[0]['desc']; ?></div>
                        </div>
                    </div>
                </div>
                <table>
                    <tr>
                        <th>Ranking</th>
                        <th>Time</th>
                        <th>Títulos</th>
                        <th>Ano</th>
                        <th>País</th>
                    </tr>
                    <?php
                        $timeColor = "rgb(255, 215, 0)";
                        for ($i = 0; $i < 10; $i++) {
                            echo "<tr data-index=\"$i\">";
                            echo '<td>' . $i + 1 . '</td>';
                            echo "<td style=\"color:$timeColor\">" . $times[$i]['nome'] . '</td>';
                            echo '<td><b>' . $times[$i]['títulos'] . '</b></td>';
                            echo '<td>' . implode(', ', $times[$i]['anos_títulos']) . '</td>';
                            echo "<td style=\"color:$timeColor\"><b>" . $times[$i]['bandeira'] . '</b></td>';
                            echo '</tr>';
                        }
                    ?>
                </table>
            </div>
        </div>
        <div class="wrap-section">
            <div class="wrap-header">
                <span class="wrap-title">Partidas Jogadas da CONMEBOL Libertadores</span>
            </div>
            <hr>
            <div class="wrap-content">
                <p>Atualmente são <b><?php
                    $data_atual = new DateTime();
                    
                    $data_primeiro_dia_do_ano = new DateTime(date('Y-01-01'));
                    
                    $diferenca = date_diff($data_primeiro_dia_do_ano, $data_atual);
                    
                    $dias_decorridos = $diferenca->format('%a');
                    
                    echo $dias_decorridos;
                ?></b> partidas disputadas do campeonato Libertadores</p>
                <p><i style="opacity: 0.5;">Ultima Atualização: <?php echo date('d/m/y')?></i></p>
            </div>
        </div>
        <div class="wrap-section">
            <div class="wrap-header">
                <span class="wrap-title">Times que mais jogaram</span>
            </div>
            <hr>
            <div class="wrap-content">
                <p>Top 5 times com mais jogos disputados no campeonato Libertadores</p>
                <table>
                    <tr>
                        <th>Ranking</th>
                        <th>Time</th>
                        <th>Jogos</th>
                    </tr>
                    <?php
                        $timeColor = "rgb(255, 215, 0)";
                        for ($i = 0; $i < 5; $i++) {
                            echo "<tr data-index=\"$i\">";
                            echo '<td>' . $i + 1 . '</td>';
                            echo "<td style=\"color:$timeColor\">" . $participacoes[$i]['nome'] . '</td>';
                            echo '<td><b>' . $participacoes[$i]['part'] . '</b></td>';
                            echo '</tr>';
                        }
                    ?>
                </table>
            </div>
        </div>
        <div class="wrap-section">
            <div class="wrap-header">
                <span class="wrap-title">Jogadores com maiores Gols da Libertadores</span>
            </div>
            <hr>
            <div class="wrap-content">
                <p>Top 3 Jogadores com maiores Gols do campeonato</p>
                <table>
                    <tr>
                        <th>Ranking</th>
                        <th>Jogador</th>
                        <th>Gols</th>
                    </tr>
                    <?php
                        $timeColor = "rgb(255, 215, 0)";
                        for ($i = 0; $i < 3; $i++) {
                            echo "<tr data-index=\"$i\">";
                            echo '<td>' . $i + 1 . '</td>';
                            echo "<td style=\"color:$timeColor\">" . $jogadores[$i]['nome'] . '</td>';
                            echo '<td><b>' . $jogadores[$i]['gols'] . '</b></td>';
                            echo '</tr>';
                        }
                    ?>
                </table>
            </div>
        </div>
        <div class="info-card-page" id="infoCard">
            <div class="info-icon"><span>i</span></div>
            <p id="infoText">Atenção! As informações contidas nesse site podem não corresponder com a realidade! Dados presentes apenas para fins ilustrativos.</p>
        </div>
    </div>
</body>
<script>
    const times = <?php echo json_encode($times); ?>; // Defina a variável times com os dados do PHP
    const rows = document.querySelectorAll("table tr");
    const cardNome = document.querySelector(".card-time-nome");
    const cardDesc = document.querySelector(".card-time-desc");
    const cardBand = document.querySelector(".card-time-bandeira");
    const cardTitulos = document.querySelector(".card-time-titulos");
    const cardImg = document.querySelector(".card-time-img img");
    const cardRank = document.querySelector(".card-ranking");

    rows.forEach(function (row, index) {
        row.addEventListener("click", function () {
            const dataIndex = row.getAttribute("data-index");

            if (dataIndex !== null && dataIndex !== undefined) {
                const time = times[parseInt(dataIndex)];

                cardImg.src = time.img;
                cardNome.textContent = time.nome;
                cardDesc.textContent = time.desc;
                cardBand.textContent = time.bandeira;
                cardTitulos.textContent = time.anos_títulos.join(', ');
            }
        });
    });
</script>

<script src="../script.js"></script>

</html>