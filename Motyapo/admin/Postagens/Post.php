<div class="container-fluid mt-2">
    
    <a class="btn btn-outline-primary float-right" href="?m=Postagens/salvar">Add</a><!--*esse botao deve aparecer so pra adms-->
    <br><br>

    <div class="row p-5">

        <?php
        //coloca a classe Post
        include_once '../class/Post.php';
        $pos = new Post();
      
        //faz a consulta no banco
        $dados = $pos->consultar();
    
        if (!empty($dados)) {
            //coloca todas as postagens do banco
            foreach ($dados as $mostrar) {
        ?>
        
                <div class="col-sm-4">
                    <div class="card shadow m-3 ">
                        <img class="card-img-top" src="../img/<?= $mostrar['imagem'] ?>" alt="Imagem de capa do card">
                        <div class="card-body">
                            <h5 class="card-title"><?= $mostrar['titulo'] ?></h5>
                            <p class="card-text"><?= $mostrar['descricao'] ?></p>
                            <p class="card-text"><small class="text-muted">Por: <?= $mostrar['id_adm'] ?></small></p>
                            <p class="card-text"><small class="text-muted"><?= $mostrar['dataPost']  ?></small></p>

                        </div>
                    </div>
                </div>
        <?php }
        } ?>

    </div>
</div>