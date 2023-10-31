<div class="col-sm-12 mb-4">
    <h3 class="text-primary">
        Nova Postagem
    </h3>
</div>

<div class="col-sm-12">
    <div class="card shadow">
        <form method="post" name="frmsalvar" id="frmsalvar" class="m-3">
            <div class="form-group">
                <label for="txttitulo" class="col-sm-2 col-form-label">
                    Titulo
                </label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="txttitulo" name="txttitulo" placeholder="Digite o Titulo" maxlength="200" minlength="1" />
                </div>
            </div>

            <div class="form-group">
                <label for="txtdescricao" class="col-sm-2 col-form-label">Descrição</label>
                <div class="col-sm-12">
                    <textarea class="form-control" id="txtdescricao" rows="3" name="txtdescricao" placeholder="Sua descrição aqui"></textarea>
                </div>
            </div>

            <!-- Lugar para colocar um arquivo de imagem -->
            <div class="form-group">
                <label for="txtimagem" class="col-sm-2 col-form-label">
                   Nome da imagem e tipo
                </label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="txtimagem" name="txtimagem" placeholder="Digite o Titulo" maxlength="200" minlength="1" />
                </div>
            </div>

            <div class="form-group row">
                <div class="col-sm-12">
                    <input type="submit" class="btn btn-primary m-3" name="btnsalvar" id="btnsalvar" value="Salvar" />
                    <a class="btn btn-danger" href="?p=postagens/post"><i class="bi bi-arrow-return-left"></i></a>
                </div>
            </div>
        </form>
    </div>
</div>
<?php

//salva as informações do forms
if (filter_input(INPUT_POST, 'btnsalvar')) {
    $titulo = filter_input(INPUT_POST, 'txttitulo');
    $descricao = filter_input(INPUT_POST, 'txtdescricao');
    $imagem = filter_input(INPUT_POST, 'txtimagem');

    include_once '../class/Post.php';
    $cat = new Post();

    $cat->setTitulo($titulo);
    $cat->setDescricao($descricao);
    $cat->setData(date('d/m/Y'));
    $cat->setImage($imagem);
  

    echo '<div class="alert alert-primary mt-3" role="alert">'
        . $cat->salvar()
        . '</div>';
}
