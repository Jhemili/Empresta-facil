<?php include "head.php";
      include "protect.php";
      include "side-menu.php";
?>

<main>
    <div class="card">
        <div class="container-titulos">
            <h1>Itens</h1>
            <h2>Cadastre novos itens</h2>
        </div>       
        <form action="processa_item.php" method="POST" name="cadastrar-item" class="container container-itens">
            <label for="item-nome">Item nome</label><input class="input-cadastrar" type="text" name="item_nome" required>
            <label for="item-nome">Descrição</label><input class="input-cadastrar" type="text" name="item_descricao">
            <button type="submit" name="cadastrar">cadastrar</button>  
        </form>
    </div>
</main>

