<div class="row">
    <div class="col-0 col-sm-1 col-md-3 col-lg-3 col-xl-3  "></div>
    <div class="col-12 col-sm-10 col-md-6 col-lg-6 col-xl-6  ">
        <div class="text-center p-5 mx-5 config">
            <form class="form-signin" method="post">

                <h1 class="h3 mb-3 font-weight-normal">Faça login</h1>

                <label for="inputNome" class="sr-only">Nome</label>
                <input type="text" id="inputNome" class="form-control" placeholder="Seu nome" required autofocus name="txtnome">

                <label for="inputEmail" class="sr-only">Endereço de email</label>
                <input type="email" id="inputEmail" class="form-control" placeholder="Seu email" required autofocus name="txtemail">

                <label for="inputPassword" class="sr-only">Senha</label>
                <input type="password" id="inputPassword" class="form-control" placeholder="Senha" required name="txtsenha">

                <input type="submit" class="btn btn-lg btn-primary btn-block mt-5" name="btncriar" value="Criar" />
                <a href="?m=login">já tenho conta</a>

            </form>
        </div>
        <div class="col-0 col-sm-1 col-md-3 col-lg-3 col-xl-3 "></div>
    </div>
</div>

<?php
//caso aperte o botao criar
if (filter_input(INPUT_POST, 'btncria')) {
    $email = filter_input(INPUT_POST, 'txtemail');
    $senha = filter_input(INPUT_POST, 'txtsenha');
    $nome = filter_input(INPUT_POST, 'txtnome');

    //coloca a classe usuario
    include_once '../class/Usuario.php';
    $prod = new Usuario();

 //enviados os dados para os atributos da classe
    $prod->setNome($nome);
    $prod->setEmail($email);
    $prod->setSenha($senha);
    
    //consulta se o email e senhas ja existem caso sim ele loga direto
    if ($prod->consultar() > 0) {
        $_SESSION['acesso'] = 'b8d66a4634503dcf530ce1b3704ca5dfae3d34bb';
        header("location:index.php");
        exit; // Importante para evitar que o código continue a ser executado
    } else {

        //caso não tenha ele cria/salva as informações

        if ($prod->salvar()) {
            echo '<div class="alert alert-success" role="alert>"' . "Salvo com sucesso" . '</div>';
         
            $_SESSION['acesso'] = '0bb99a07048be9e343e4d860fd452960fc0d6086';
            header("location:index.php");
                exit;
        } else {
            echo '<div class="alert alert-danger" role="alert>"' . "Erro ao salvar" . '</div>';
        }
       
    }
}
?>