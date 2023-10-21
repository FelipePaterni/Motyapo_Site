<form class="form-signin mt-5">
    <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>
    <label for="inputEmail" class="sr-only">Endereço de email</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Seu email" required autofocus>
    <label for="inputPassword" class="sr-only">Senha</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required>


    <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
    <a href="?m=criar">Não tenho conta</a>
</form>

<?php
if (filter_input(INPUT_POST, 'btnlogar')) {
    $email = filter_input(INPUT_POST, 'txtemail');
    $senha = filter_input(INPUT_POST, 'txtsenha');

    include_once '../controles/Usuario.php';
    $user = new Usuario();
    //enviados os dados para os atributos da classe
    $user->setEmail($email);
    $user->setSenha($senha);

    if ($user->consultar() > 0) {
        session_start();
        $_SESSION['acesso'] = '0bb99a07048be9e343e4d860fd452960fc0d6086';

        header("location:index.php");
    } else {
        $_SESSION['acesso'] = '';
        echo '<div class="row">'
            . '<div class="col-sm-12 col-md-12">'
            . '<div class="alert alert-danger" role="alert">'
            . 'Usuário e/ou senha incorretos!'
            . '</div>'
            . '</div>'
            . '</div>'
            . '</div>';
    }
}
?>
