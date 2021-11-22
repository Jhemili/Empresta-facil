<?php include "head.php";
      include "protect.php";
?>

<body>
    <?php include "side-menu.php" ?>
    <main>
        <div class="card">
            <div class="container-titulos">
                <h1>Inventário</h1>
                <h2>Gerencie seus itens.</h2>
            </div> 
            <div class="container barra-pesquisa">
            <form method="POST" action="" class="form-barra">
            <label for="barraPesquisa" class="label-barra">Pesquisar</label><input type="text" class="input-barra" name="barraPesquisa">
            <button type="submit" class="pesquisar">pesquisar</button>
            </form>      
            </div>
            <div class="container container-itens exibe-item">
                    <?php echo "<div class='item-cadastrado'>
                        <div class='item-div'> 
                        <h3 class='nome-item'>Exemplo 1</h3>
                        <p class='descricao-item'>Descrição do exemplo 1</p>
                        </div>
                        <div class='item-div div-botoes'>
                        <button class='emprestar'><a class='bt-link' href='emprestar.php'>emprestar</a></button>
                        <button class='excluir'>excluir</button></div></div>"; 
                    ?>   
            </div>
            <div class="container"><button class="cadastrar-item"><a class="bt-link" href="cadastrar_item.php">cadastrar novo</a> </button></div>
        </div>
    </main>

