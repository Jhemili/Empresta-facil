<?php 
      include "conexao.php";
      include "head.php";
      include "protect.php";
if(!isset($_SESSION)){
    session_start();
}
$idUsuario = $_SESSION['user'];  
if(!isset($_POST['enviar']))
{
    $sqlBusca = "SELECT * FROM itens WHERE usuario = $idUsuario AND estatus = 1";
    $sqlBuscando = $conn->query($sqlBusca) or die($conn->error);
} else {
    $pesquisar = $_POST['barraPesquisa'];
    $sqlBusca = "SELECT * FROM itens WHERE nome_item LIKE '%$pesquisar%' AND usuario = $idUsuario AND estatus = 1";
    $sqlBuscando = $conn->query($sqlBusca) or die($conn->error);  
    unset($_POST['enviar']);
}
      
?>
<body>
    <?php include "side-menu.php" ?>
    <main>
        <div class="card">
            <div class="container-titulos">
                <h1>Itens Emprestados</h1>
                <h2>Visualize datas de retorno e<br> receba itens</h2>
            </div> 
            <div class="container barra-pesquisa">
            <form method="POST" action="" class="form-barra">
            <label for="barraPesquisa" class="label-barra">Pesquisar</label><input type="text" class="input-barra" name="barraPesquisa">
            <button type="submit" name="enviar" class="pesquisar">enviar</button>
            </form>      
            </div>
            <div class="container container-itens exibe-item">
                    <?php 
                        while($item = $sqlBuscando->fetch_assoc())
                        {  
                            $idItem = $item['id_item'];
                            $nomeItem = $item['nome_item'];
                            $descricao = $item['descricao'];
                            $status = $item['estatus'];
                            $retorna = $item['data_retorno'];

                            echo "<form method='POST' action = 'receber_item.php' class='item-cadastrado'>
                            <div class='item-div'> 
                            <h3 class='nome-item'>$nomeItem</h3>
                            <p class='descricao-item'>$descricao</p>
                            <input type='hidden' name='idItem' value='$idItem'>
                            </div>
                            <div class='item-div div-botoes'>
                            <span>Data retorno</span>
                            <span class='data-retorno'>$retorna</span>
                            <button type='submit' name='receber' class='bt'>receber</button></div></form>";
                                              
                        } 
                    ?>   
            </div>
            <div class="container"><button class="cadastrar-item"><a class="bt-link" href="inventario.php">novo empréstimo</a> </button></div>
        </div>
    </main>
<?php include "footer.php"?>