<?php 

    include "protect.php";
    include "conexao.php";
  
    $idItem = filter_input(INPUT_POST,'idItem');        

if (isset($_POST['emprestar']))
{
    include "head.php";
    include "side-menu.php";
    echo "
    <main>
        <div class='card'>
            <div class='container-titulos'>
                <h1>Emprestar</h1>
                <h2>Indique o destinatário <br>e data de retorno do item</h2>
            </div>       
            <div class='container container-form-emprestar'>
                <form action='salva_emprestar.php' method='POST' name='emprestar'>
                    <div class='form-input'>
                        <label for='destinatario'>Destinatário</label> <input name='destinatario' type='text' required>
                        <input type='hidden' name='idItem' value='$idItem'>
                    </div>
                    <div class='form-input'>
                        <label for='celular'>Contato</label><input name='celular' type='tel' id='celular' maxlength='14' data-js='celular' placeholder='celular' required>
                        <input name='telefone_fixo' type='tel' id='tel-fixo' maxlength='13' data-js='tel_fixo' placeholder='telefone fixo'>
                    </div>
                    <div class='form-input'>
                        <label for='data-retorno'>Data de retorno</label> <input name='dataRetorno' type='date' required>
                    </div>
                    <button type='submit' value='salvar' name='salvar'>Salvar</button>             
                </form>
            </div>
        </div>
    </main>";
} 
elseif (isset($_POST['excluir'])){
    $sqlExcluir = "DELETE FROM itens WHERE itens.id_item = '$idItem'";
    $sqlExcluir = $conn->query($sqlExcluir);
    header("Location: inventario.php");
}


include "footer.php" ?>