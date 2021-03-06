
<?php 
      require "conexao.php";
      include "protect.php";
      include "head.php";
      include "format.php";
if(!isset($_SESSION)){
    session_start();
}
$idUsuario = $_SESSION['user'];  

if(!isset($_POST['enviar']))
{
    $sqlBusca = "SELECT * FROM itens INNER JOIN destinatario ON itens.destinatario = destinatario.id_destinatario INNER JOIN telefone ON destinatario.telefone = telefone.id_telefone WHERE itens.estatus = 1 AND itens.usuario = $idUsuario";
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
                <h2 class="on-print-hide">Visualize datas de retorno e<br> receba itens</h2>
            </div> 
            <div class="container barra-pesquisa on-print-hide">
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
                            $destinatario = $item['nome_destinatario'];
                            $celular = format($item['celular']);
                            if(!empty($item['telefone_fixo'])){
                                $telFixo = format($item['telefone_fixo']);
                            } else {
                                $telFixo = "";
                            }
                            $status = $item['estatus'];
                            $retorna = $item['data_retorno'];
                            $data = date('d-m-Y', strtotime($retorna));
                            $now = date('d-m-Y');    
                            if(strtotime($data) < strtotime($now)){
                                $data = str_replace($data,'<mark>'.$data.'</mark>',$data);
                            }
                            echo "<form method='POST' action = 'receber_item.php' class='item-cadastrado'>
                            <div class='item-div'> 
                            <h3 class='nome-item'>$nomeItem</h3>
                            <p>Destinat??rio: $destinatario</p>
                            <p>Celular: $celular</p>
                            <p>Fone Fixo: $telFixo</p>
                            <input type='hidden' name='idItem' value='$idItem'>
                            </div>
                            <div class='item-div div-botoes'>
                            <span class='tx-data' >Data retorno<br>$data</span>
                            <button type='submit' name='receber' class='bt on-print-hide'>receber</button></div>
                            </form>
                            ";
                                              
                        } 
                        if($sqlBuscando->num_rows == 0){
                            echo "<h2 class='msg-item'>Nenhum item emprestado<h2>";
                        }
                    ?>   
            </div>
            <div class="container on-print-hide"><button class="cadastrar-item"><a class="bt-link" href="inventario.php">novo empr??stimo</a> </button>
            <button class="bt-print on-print-hide" onclick='window.print()'>Imprimir relatat??rio</button>
        </div>
    </main>
<?php include "scripts.php"?>