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
    $sqlBusca = "SELECT * FROM itens WHERE usuario = $idUsuario";
    $sqlBuscando = $conn->query($sqlBusca) or die($conn->error);
} else {
    $pesquisar = $_POST['barraPesquisa'];
    $sqlBusca = "SELECT * FROM itens WHERE nome_item LIKE '%$pesquisar%' AND usuario = $idUsuario";
    $sqlBuscando = $conn->query($sqlBusca) or die($conn->error);  
    unset($_POST['enviar']);
}

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
                            if ($status == 0 ){
                                echo "<form action='processa_emprestar.php' method='POST' class='item-cadastrado'>
                                <div class='item-div'> 
                                <h3 class='nome-item'>$nomeItem</h3>
                                <p class='descricao-item'>$descricao</p>
                                <input type='hidden' name='idItem' value='$idItem'>
                                </div>
                                <div class='item-div div-botoes'>
                                <button type='submit' name='emprestar' class='bt-emprestar'>emprestar</button>
                                <button class='bt-excluir'>excluir</button></div></form>";
                            }                    
                        } 
                    ?>   
            </div>
            <div class="container"><button class="cadastrar-item"><a class="bt-link" href="cadastrar_item.php">cadastrar novo</a> </button></div>
        </div>
    </main>
<?php include "footer.php"?>
