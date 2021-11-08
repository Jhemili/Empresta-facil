<?php include "head.php" ?>
<body>
    <?php include "side-menu.php" ?>
    <main>
        <div class="card">
            <div class="container-titulos">
                <h1>Inventário</h1>
                <h2>Gerencie seus itens.</h2>
            </div>       
            <div class="container container-itens">
                <div class="item-cadastrado">
                    <div class="item-div"> 
                        <h3 class="nome-item">Exemplo 1</h3>
                        <p class="descricao-item">Descrição do exemplo 1</p>
                    </div>     
                    <div class="item-div div-botoes">
                        <button class="emprestar"><a class="emprestar-link" href="emprestar.php">emprestar</a></button>
                        <button class="excluir">excluir</button>
                    </div>                   
                </div>    
                <button type="submit">cadastrar novo</button>  
            </div>
        </div>
    </main>
<?php include "footer.php" ?>
