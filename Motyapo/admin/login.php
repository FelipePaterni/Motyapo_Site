<div class="row">
    <div class="col-0 col-sm-1 col-md-3 col-lg-3 col-xl-3  "></div>
    <div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-6  ">
        <div class="text-center p-5 mx-5 config">
            <form class="form-signin" method="post">

                <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>

                <label for="inputEmail" class="sr-only">Endereço de email</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Seu email" required autofocus name="txtemail">

                <label for="inputPassword" class="sr-only">Senha</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required name="txtsenha">

                <input type="submit" class="btn btn-lg btn-primary btn-block mt-5" name="btnlogar" value="Login" />
                <a href="?m=criar">Não tenho conta</a>

            </form>
        </div>
        <div class="col-0 col-sm-1 col-md-3 col-lg-3 col-xl-3 "></div>
    </div>
</div>

<?php
//caso aperte o botao criar
if (filter_input(INPUT_POST, 'btnlogar')) {
    $email = filter_input(INPUT_POST, 'txtemail');
    $senha = filter_input(INPUT_POST, 'txtsenha');

//coloca a classe usuario
    include_once '../class/Usuario.php';
    $user = new Usuario();
    //enviados os dados para os atributos da classe
    $user->setEmail($email);
    $user->setSenha($senha);

    
        $dados = $user->consultar();
        if (isset($dados['id'])) {}
    if ($user->consultar() > 0) {
       
        // Inicie a sessão
        session_start();

        // Armazene o codigo de acesso da sessão 
        $_SESSION['acesso'] = '0bb99a07048be9e343e4d860fd452960fc0d6086';
 
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