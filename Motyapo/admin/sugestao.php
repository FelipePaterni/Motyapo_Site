<hr>

<div class="container-fluid mt-5">

<div class="card shadow">

        <form method="post" name="frmsugestao" id="frmsugestao" class="m-3">
        <h3 class="card-title mb-4">
        Sugestões 
    </h3>
            <div class="form-group">
                <label for="txtnome" class="col-sm-3 col-form-label">
                   Digite seu nome(opcional)
                </label>
                <div class="col-sm-12">
                    <input type="text" class="form-control" id="txtnome" name="txtnome" placeholder="Seu nome (opcional)." maxlength="200" minlength="1" />
                </div>
            </div>

            <div class="form-group">
                <label for="txtsugestao" class="col-sm-3 col-form-label"> Sugestão</label>
                <div class="col-sm-12">
                    <textarea class="form-control" id="txtsugestao" rows="3" name="txtsugestao" placeholder="Sua descrição aqui."></textarea>
                </div>
            </div>        
          

            <div class="form-group row">
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-primary m-3" name="btnsalvar" id="btnsalvar" value="Salvar" ><i class="bi bi-send-fill"> Enviar</i>     </button>
                    <input type="reset" class="btn btn-secondary m-3" name="btnlimpar" value="Limpar" /> <i class="fa-solid fa-circle-check"></i>                  
                </div>
            </div>
        </form>
    </div>
</div>

<?php

//salva as informações do forms
if (filter_input(INPUT_POST, 'btnsalvar')) {
    $nome = filter_input(INPUT_POST, 'txtnome');
    $sugestao = filter_input(INPUT_POST, 'txtsugestao');


    include_once '../class/Sugestao.php';
    $cat = new Sugestao();

    $cat->setNome($nome);
    $cat->setSugestao($sugestao);
    date_default_timezone_set('America/Sao_Paulo');
    $cat->setDataPost(date('d/m/Y'));
    if(($sugestao !== null) && ($sugestao !== '')){
    $cat->salvar();}
    
      
}