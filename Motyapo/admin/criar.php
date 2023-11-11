<?php


if (isset($_SESSION['acesso']) && $_SESSION['acesso'] === '0bb99a07048be9e343e4d860fd452960fc0d6086') {
    header("location: index.php");
    exit; // Encerre o script após o redirecionamento.
}

if (filter_input(INPUT_POST, 'btncriar')) {
    $email = filter_input(INPUT_POST, 'txtemail');
    $senha = filter_input(INPUT_POST, 'txtsenha');
    $nome = filter_input(INPUT_POST, 'txtnome');
    $novidade = filter_input(INPUT_POST, 'checknovidade');
    $adm = 0;

    if ($novidade == null || $novidade == '') {
        $novidade = 0;
    }

    include_once '../class/Usuario.php';
    $user = new Usuario();

    $user->setNome($nome);
    $user->setEmail($email);
    $user->setSenha($senha);
    $user->setadm($adm);
    $user->setNovidade($novidade);

    // Consulta se o email e senhas já existem; caso sim, ele faz o login diretamente.
    if ($user->consultarLogin() > 0) {
        // Armazene o ID na sessão (ou em uma variável de sessão)
        $_SESSION['acesso'] = '0bb99a07048be9e343e4d860fd452960fc0d6086';

        $dados = $user->consultar();
        foreach ($dados as $key) {
            $_SESSION['id'] = $key['id'];
        }
        header("location: index.php");
        exit; // Encerre o script após o redirecionamento.
    } else {
        // Caso não tenha, crie/salve as informações
        if ($user->salvar()) {
            $_SESSION['acesso'] = '0bb99a07048be9e343e4d860fd452960fc0d6086';
            $dados = $user->consultar();
            foreach ($dados as $key) {
                $_SESSION['id'] = $key['id'];
            }
            header("location: index.php");
            exit; // Encerre o script após o redirecionamento.
        } else {
            echo '<div class="alert alert-danger" role="alert>"' . "Erro ao salvar" . '</div>';
        }
    }
}
?>

<div class="row mr-0">
    <div class="col-0 col-sm-1 col-md-3 col-lg-3 col-xl-3  "></div>
    <div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-6  ">
        <div class="text-center mt-2 card p-5 shadow">
            <form class="form-signin" method="post">

                <h1 class="h3 mb-3 font-weight-normal">Crie uma conta</h1>

                <label for="inputNome" class="sr-only">Nome</label>
                <input type="text" id="inputNome" class="form-control" placeholder="Seu nome" required autofocus name="txtnome">

                <label for="inputEmail" class="sr-only">Endereço de email</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Seu email" required autofocus name="txtemail">

                <label for="inputPassword" class="sr-only">Senha</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required name="txtsenha">

                <div class="form-group form-check">
                <input id="checknovidade" type="checkbox" class="form-check-input" name="checknovidade" value="1">
                <label class="form-check-label" for="checknovidade">Desejo receber novidades</label>
                </div>
                <input type="submit" class="btn btn-lg btn-primary btn-block mt-5" name="btncriar" value="Criar" />
                <a href="?m=login">já tenho conta</a>

            </form>
        </div>
        <div class="col-0 col-sm-1 col-md-3 col-lg-3 col-xl-3 "></div>
    </div>
</div>


