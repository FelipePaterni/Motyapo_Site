

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php include_once 'cabecalho.php'; ?>
</head>

<body>

    <nav class="conteiner navbar-dark " style="background-color: rgba(8, 1, 64, 1);" id="deslogado">
        <ul class="nav mt-0  justify-content-end">
            <li class="nav-item">
                <a class="nav-link text-light" href="?m=login">Entrar</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light " href="?m=criar">Criar conta</a>
            </li>
        </ul>
    </nav>
    <nav class="conteiner navbar-dark " style="background-color: rgba(8, 1, 64, 1);" id="logado">
        <ul class="nav mt-0  justify-content-end">
            <li class="nav-item">
                <a class="nav-link text-light" href="">Conta</a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-light " href="?m=logout">Sair</a>
            </li>
        </ul>
    </nav>
    <?php include_once 'navbar.php'; ?>

    <div class="container-fluid p-0 m-0" id="home">
        <?php
        $pagina = filter_input(INPUT_GET, 'm');

        if (empty($pagina) || !isset($pagina)) {
            include_once 'home.php';
        } else {
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