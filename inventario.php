<?php 
      require "conexao.php";
      include "protect.php";
      include "head.php";
if(!isset($_SESSION)){
    session_start();
}
$idUsuario = $_SESSION['user'];  
if(!isset($_POST['enviar']))
{
    $sqlBusca = "SELECT * FROM itens WHERE usuario = $idUsuario AND estatus = 0";
    $sqlBuscando = $conn->query($sqlBusca) or die($conn->error);
} else {
    $pesquisar = $_POST['barraPesquisa'];
    $sqlBusca = "SELECT * FROM itens WHERE nome_item LIKE '%$pesquisar%' AND usuario = $idUsuario  AND estatus = 0";
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
                <p class="descricao-card">Itens já emprestados não são exibidos.</p>
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
                            $retornou = $item['data_emprestimo'];
                            if($retornou == null){
                                $retornou = 'nunca foi emprestado';
                            } else {
                                $retornou = 'Devolvido em: '.date('d-m-Y', strtotime($item['data_retorno']));
                            }
                            echo "<form action='processa_emprestar.php' method='POST' class='item-cadastrado'>
                            <div class='item-div'> 
                            <h3 class='nome-item'>$nomeItem</h3>
                            <p class='descricao-item'>Descrição: $descricao</p>
                            <p class='retornou'>$retornou</p>
                            <input type='hidden' name='idItem' value='$idItem'>
                            </div>
                            <div class='item-div div-botoes'>
                            <button type='submit' name='emprestar' value='emprestar' class='bt-emprestar'>emprestar</button>
                            <button type='submit' name='excluir' value='excluir' class='bt-excluir'>excluir</a></button></div></form>";
                                               
                        } 
                        if($sqlBuscando->num_rows == 0){
                            echo "<h2 class='msg-item'>Nenhum item disponível<h2>";
                        }
                    ?>   
            </div>
            <div class="container"><button class="cadastrar-item"><a class="bt-link" href="cadastrar_item.php">cadastrar novo</a> </button></div>
        </div>
    </main>
  

