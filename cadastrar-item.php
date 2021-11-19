<?php include "head.php";
      include "protect.php"; 
?>

<body>
    <?php include "side-menu.php" ?>
    <main>
        <div class="card">
            <div class="container-titulos">
                <h1>Itens</h1>
                <h2>Cadastre novos itens</h2>
            </div>       
            <form action="" method="post" name="cadastrar-item" class="container container-itens">
                <label for="item-nome">Item nome</label><input class="input-cadastrar" type="text" name="item-nome">
                <label for="item-nome">Descrição</label><input class="input-cadastrar" type="text" name="item-descricao">
                <button type="submit"><a class="bt-link" href="cadastrar-item.php">cadastrar</a></button>  
            </form>
        </div>
    </main>
<?php include "footer.php" ?>
