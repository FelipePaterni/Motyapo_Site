<div class="row mr-0">
    <div class="col-0 col-sm-1 col-md-3 col-lg-3 col-xl-3  "></div>
    <div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-6  ">
        <div class="text-center mt-2 card p-5 shadow">
            <form class="form-signin" method="post" name="frmsalvar" id="frmsalvar" >

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
if (isset($_SESSION['acesso']) && $_SESSION['acesso'] === '0bb99a07048be9e343e4d860fd452960fc0d6086') {
    header("location:index.php");
} else {
    if (filter_input(INPUT_POST, 'btnlogar')) {
     
        $email = filter_input(INPUT_POST, 'txtemail');
        $senha = filter_input(INPUT_POST, 'txtsenha');

        include_once '../class/Usuario.php';
        $user = new Usuario();
        //enviados os dados para os atributos da classe
        $user->setEmail($email);
        $user->setSenha($senha);

        if ($user->consultarLogin() > 0) {

  
            // Armazene o ID na sessão (ou em uma variável de sessão)
            $_SESSION['acesso'] = '0bb99a07048be9e343e4d860fd452960fc0d6086';
            $_SESSION['id'] = $user->getId();
         
            $dados = $user->consultar();
            foreach ($dados as $key) {
                $_SESSION['id'] = $key['id'];
            }
            header('location:./?m=home');
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
}

?>