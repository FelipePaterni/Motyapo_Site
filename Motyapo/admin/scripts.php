<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>


<script>
<?php

//trava de login
date_default_timezone_set('America/Sao_Paulo');
(!isset($_SESSION) ? session_start() : "");

if ($_SESSION['acesso'] != 'b8d66a4634503dcf530ce1b3704ca5dfae3d34bb') {
     $isLogado = true;
}else{ $isLogado = false;}
?>
var isLogado = <?php echo $isLogado; ?>;


    $(document).ready(function () {
        $('#deslogado').hide();
        $('input:radio[name="escolha"]').change(function () {
            if (isLogado) {
                $('#logado').show();
                $('#deslogado').hide();
            } else if (!isLogado) {
                $('#logado').hide();
                $('#deslogado').show();
            }
        });
    });
</script>
<