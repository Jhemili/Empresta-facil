<?php 
include "conexao.php";
if(!isset($_SESSION)){
    session_start();
}
$idUsuario = $_SESSION['user'];
if(isset($_POST['pesquisar']))
{   
    $pesquisar = $_POST['pesquisar'];
    $sqlBusca = "SELECT * FROM itens WHERE itens.nome_item LIKE '%$pesquisar%' AND itens.usuario = $idUsuario LIMIT 3";
    $sqlBuscando = $conn->query($sqlBusca) or die($conn->error); 

    while($item = $sqlBuscando->fetch_assoc())
    {
        $nomeItem = $item['nome_item'];
        $descricao = $item['descricao'];
        $status = $item['status'];

        echo $nomeItem." ".$descricao."  ".$status;


    }
}

?>