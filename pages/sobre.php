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
                    Alunos
                </span>
            </div>
            <hr>
            <div class="wrap-content">
                <b><p>Marcos Antônio Medrado Alves Junior</p><br></b>
                <b><p>Kaique Sales Vilella</p><br></b>
                <b><p>Vinícius Abreu Da Silva</p><br></b>
                <b><p>Emily Marinho Gonçalves</p></b>
            </div>
        </div>
        <div class="wrap-section">
            <div class="wrap-header">
                <span class="wrap-title">
                    Controle de Sessions
                </span>
            </div>
            <hr>
            <div class="wrap-content">
                <p>A sessão é uma ferramenta poderosa no PHP para rastrear informações do usuário entre diferentes páginas. Ela é frequentemente usada para autenticar usuários e armazenar informações de login, como nome de usuário e dados da sessão. Aqui está como usamos o controle de sessões em nosso sistema:</p>
                <br>
                <p>1. <strong>Login:</strong> Quando um usuário tenta fazer login, o arquivo "auth.php" é acionado. Ele verifica as credenciais (nome de usuário e senha) fornecidas pelo usuário em relação às credenciais válidas definidas no código. Se as credenciais estiverem corretas, uma variável de sessão chamada "usuario_logado" é definida como verdadeira, indicando que o usuário está logado. Caso contrário, uma mensagem de erro é definida em uma variável de sessão chamada "erro_login".</p>
                <br>

                <p>2. <strong>Logout:</strong> Quando um usuário clica em "Sair", o arquivo "logout.php" é acionado. Ele remove todas as variáveis de sessão e destrói a sessão, efetivamente encerrando a sessão do usuário.</p>
                <br>

                <p>3. <strong>Página Inicial:</strong> A página inicial, "index.php", verifica se o usuário está logado. Se a variável de sessão "usuario_logado" estiver definida como verdadeira, exibe as informações do usuário (nome e email) e oferece a opção de sair. Caso contrário, exibe um formulário de login. Caso o usuário tente acessar outras páginas sem estar efetivamente logado em sua conta, ele será redirecionado para a página "index.html" e retornando uma mensagem de erro.</p>
                <br>
            </div>
        </div>
        <div class="wrap-section">
            <div class="wrap-header">
                <span class="wrap-title">
                    Elementos PHP
                </span>
            </div>
            <hr>
            <div class="wrap-content">
                <p>session_start(): Esta função inicia ou retoma uma sessão no PHP. As sessões são usadas para armazenar informações do usuário entre várias solicitações de página. Ela deve ser chamada antes de qualquer saída para o navegador, como HTML.</p><br>

                <p>Declaração de variáveis: O código define duas variáveis, $username e $usermail, com valores específicos. Essas variáveis são usadas posteriormente para exibir informações do usuário.</p><br>

                <p>Verificação de usuário logado:</p><br>

                <p>O código define a variável $usuarioLogado como false.</p><br>

                <p>Ele verifica se a variável de sessão usuario_logado existe e se seu valor é igual a true. Se sim, ele define a variável $usuarioLogado como true.</p><br>

                <p>Armazenamento de informações em sessão:</p><br>

                <p>As informações do usuário, como nome de usuário e endereço de e-mail, são armazenadas nas variáveis de sessão username e usermail.</p><br>

                <p>Estrutura condicional if e else: O código verifica se o usuário está logado ($usuarioLogado é true) e exibe o conteúdo apropriado com base nessa condição. Se o usuário estiver logado, ele exibirá informações do usuário e opções de logout. Caso contrário, ele exibirá um formulário de login.</p><br>

                <p>Exibição de mensagens de erro:</p><br>

                <p>O código verifica se a variável de sessão erro_login existe e, se existir, ele exibirá um modal de erro no JavaScript, mostrando a mensagem de erro e, em seguida, limpará a mensagem de erro da sessão usando unset().</p><br>

                <p>session_start(): Inicia ou retoma uma sessão no PHP, permitindo o uso de variáveis de sessão para armazenar informações do usuário.</p><br>

                <p>Verificação das credenciais:</p><br>

                <p>O código verifica se as variáveis $_POST['username'] e $_POST['password'] existem. Essas variáveis são usadas para recuperar o nome de usuário e senha enviados pelo formulário de login.</p><br>

                <p>Ele compara o nome de usuário e a senha inseridos ($usuarioInserido e $senhaInserida) com os valores válidos definidos ($usuarioValido e $senhaValida).</p><br>

                <p>Se as credenciais inseridas forem válidas:</p><br>

                <p>Se o nome de usuário e a senha inseridos corresponderem aos valores válidos, o código define uma variável de sessão usuario_logado como true, indicando que o usuário está autenticado.</p><br>

                <p>Ele redireciona o usuário para a página restrita "index.php" usando a função header('Location: ../index.php').</p><br>

                <p>A função exit() é chamada para interromper a execução do script após o redirecionamento.</p><br>

                <p>Se as credenciais inseridas não forem válidas:</p><br>

                <p>Se as credenciais não corresponderem, o código define uma variável de sessão erro_login com uma mensagem de erro, informando que as credenciais são inválidas.</p><br>

                <p>O usuário é redirecionado de volta para a página inicial "index.php" usando header('Location: ../index.php').</p><br>

                <p>A função exit() também é chamada para interromper a execução do script após o redirecionamento.</p><br>

                <p>session_start(): Inicia ou retoma uma sessão no PHP, permitindo o uso de variáveis de sessão para armazenar informações do usuário.</p><br>

                <p>session_unset(): Essa função é usada para limpar todas as variáveis de sessão ativas. Isso significa que todas as informações da sessão, como dados de login ou preferências do usuário, serão apagadas. As variáveis de sessão são mantidas, mas seus valores são removidos.</p><br>

                <p>session_destroy(): Esta função é usada para destruir completamente a sessão. Isso significa que não apenas os valores das variáveis de sessão são apagados, mas também o ID da sessão é eliminado, tornando impossível continuar a sessão atual. Normalmente, isso é usado quando você deseja encerrar a sessão do usuário.</p><br>

                <p>header('Location: ../index.php'): Redireciona o usuário para a página de login "index.php" após encerrar a sessão. O usuário será deslogado e direcionado para a página de login.</p><br>

                <p>exit(): Encerra a execução do script após o redirecionamento, garantindo que nada mais seja executado após a saída.</p><br>

                <p>session_start(): Inicia ou retoma uma sessão no PHP para permitir o uso de variáveis de sessão, que podem armazenar informações do usuário.</p><br>

                <p>Verificação de autenticação:</p><br>

                <p>O código verifica se a variável de sessão usuario_logado não está definida ou se seu valor não é true. Isso verifica se o usuário não está autenticado.</p><br>

                <p>Se o usuário não estiver autenticado, o código define uma variável de sessão erro_login com uma mensagem de erro e redireciona o usuário de volta para a página de login "index.php". A função exit() é chamada para garantir que o script pare de ser executado após o redirecionamento.</p><br>

                <p>Obtenção de informações do usuário autenticado:</p><br>

                <p>Se o usuário estiver autenticado, o código obtém o nome de usuário ($username) e o endereço de e-mail ($usermail) das variáveis de sessão username e usermail. Isso permite exibir as informações do usuário na página.</p><br>

                <p>HTML e exibição de informações do usuário:</p><br>

                <p>O código continua com o código HTML da página, incluindo elementos para exibir o nome de usuário e o endereço de e-mail do usuário autenticado.</p><br>

                <p>Há também um botão "Sair" que redireciona o usuário para a página de logout.</p><br>

                <p>Além disso, há um formulário para enviar mensagens com campos para nome, e-mail e mensagem. Este formulário parece ser para contato ou feedback.</p><br>

                <p>session_start(): Inicia ou retoma uma sessão no PHP para permitir o uso de variáveis de sessão, que podem armazenar informações do usuário.</p><br>

                <p>Configuração de exibição de erros:</p><br>

                <p>As três primeiras linhas configuram o PHP para exibir erros e relatórios de erro para ajudar na depuração do código. Essas configurações são úteis durante o desenvolvimento.</p><br>

                <p>Verificação de autenticação:</p><br>

                <p>O código verifica se a variável de sessão usuario_logado não está definida ou se seu valor não é true. Isso verifica se o usuário não está autenticado.</p><br>

                <p>Inclusão de um arquivo PHP:</p><br>

                <p>O código inclui o arquivo "libertadores.php" usando a função include(). Esse arquivo deve conter informações sobre os times da Libertadores.</p><br>

                <p>$times: Esta matriz contém informações sobre times de futebol que conquistaram a CONMEBOL Libertadores. Cada elemento da matriz é um array associativo que inclui os seguintes detalhes para cada time:</p><br>

                <p>'nome': O nome do time.</p><br>

                <p>'títulos': O número de títulos ganhos pelo time.</p><br>

                <p>'anos_títulos': Um array contendo os anos em que o time conquistou a Libertadores.</p><br>

                <p>'bandeira': Um emoji ou símbolo representando a bandeira do país de origem do time.</p><br>

                <p>'img': Uma URL da imagem do time (logotipo ou bandeira).</p><br>

                <p>'desc': Uma descrição ou informações adicionais sobre o time.</p><br>

                <p>$jogadores: Esta matriz contém informações sobre os jogadores com maior número de gols na história da CONMEBOL Libertadores. Cada elemento da matriz é um array associativo com o nome do jogador e o número de gols que ele marcou.</p><br>

                <p>$participacoes: Esta matriz contém informações sobre os times que mais participaram da CONMEBOL Libertadores. Cada elemento da matriz é um array associativo com o nome do time e o número de vezes que ele participou do torneio.</p><br>

                <p>A sessão é iniciada usando session_start(). Isso permite o uso de variáveis de sessão para rastrear o estado do usuário entre as páginas.</p><br>

                <p>Há uma verificação de segurança no início do código. Ele verifica se o usuário está autenticado. Se o usuário não estiver autenticado, a variável $_SESSION['erro_login'] é definida com uma mensagem de erro, e o usuário é redirecionado de volta para a página de login em ../index.php. O script é então interrompido usando exit(). Isso garante que somente usuários autenticados possam acessar a página que processa mensagens.</p><br>

                <p>O código verifica o método da solicitação HTTP usando $_SERVER["REQUEST_METHOD"]. Se o método for "POST", isso significa que o formulário foi enviado e as informações do formulário são obtidas.</p><br>

                <p>As variáveis $nome, $email e $mensagem são definidas para armazenar os dados enviados do formulário usando $_POST. Isso permite que os dados do formulário sejam usados mais adiante no código.</p><br>

                <p>O restante do código é HTML, que gera uma página de confirmação que exibe os detalhes da mensagem enviada. Ele usa as variáveis PHP $nome, $email e $mensagem para exibir os detalhes do formulário que foram enviados.</p><br>

                <p>O usuário tem a opção de retornar à página inicial clicando em um botão que leva de volta a ../index.php.</p><br>

            </div>
        </div>
    </div>
</body>
</html>