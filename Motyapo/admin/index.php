<? date_default_timezone_set('America/Sao_Paulo'); ?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include_once 'cabecalho.php'; ?>
</head>

<body>
    <?php

    // Inicie a sessão
    session_start();

    //verifica o codigo de acesso
    if (isset($_SESSION['acesso']) && $_SESSION['acesso'] === '0bb99a07048be9e343e4d860fd452960fc0d6086') {
          
        // Usuario Logado
        echo '<nav class="conteiner navbar-dark " style="background-color: rgba(8, 1, 64, 1);" id="logado">'
            . '<ul class="nav mt-0  justify-content-end">'
            . ' <li class="nav-item">'
            . '<a class="nav-link text-light" href="">'
            . 'Conta'
            . '</a>'
            . '</li>'
            . '<li class="nav-item">'
            . '<a class="nav-link text-light " href="./logout.php">Sair</a>'
            . '</li>'
            . '</ul></nav>';
    } else {
        // Usuário não está logado
        echo '<nav class="conteiner navbar-dark " style="background-color: rgba(8, 1, 64, 1);" id="deslogado">'
            . '<ul class="nav mt-0  justify-content-end">'
            . ' <li class="nav-item">'
            . '<a class="nav-link text-light" href="?m=login">Entrar</a>'
            . '</li>'
            . '<li class="nav-item">'
            . '<a class="nav-link text-light " href="?m=criar">Criar conta</a>'
            . '</li>'
            . '</ul></nav>';
    }
    ?>



    <?php include_once 'navbar.php'; ?>

    <div class="container-fluid p-0 m-0" id="home">
        <?php
        //Pega da url oque vem depois do m
        $pagina = filter_input(INPUT_GET, 'm');

        if (empty($pagina) || !isset($pagina)) {
            //se a variavel pagina estiver vazia ou não setada coloca home
            include_once 'home.php';
        } else {
            // caso tenha algo na variavel pagina, coloca ela
            if (file_exists($pagina . ".php")) {
                include_once $pagina . ".php";
            } else {
                echo '<div class="alert alert-danger mt-4" role="alert">'
                    . '<h3>Erro 404</h3>'
                    . '<p>Página não encontrada</p>'
                    . '</div>';
            }
        }
        ?>
    </div>
    <?php include_once 'scripts.php'; ?>
</body>

</html>