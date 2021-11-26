<?php 
      require "conexao.php";
      include "protect.php";


if(!isset($_SESSION)){
    session_start();
}

$idUsuario = $_SESSION['user'];     

if(isset($_POST['receber'])){
    $idItem = filter_input(INPUT_POST,'idItem');
    $now = new DateTime();
    $now = $now->format('Ymd');    
    
    $updateItem = "UPDATE itens SET estatus = 0, data_retorno = '$now' WHERE id_item = '$idItem'"; 
    $updateItem = $conn->query($updateItem)or die($conn->error);
 
    $sqlDest = "SELECT destinatario, id_telefone  FROM itens INNER JOIN destinatario ON destinatario.id_destinatario = itens.destinatario INNER JOIN telefone ON destinatario.telefone = telefone.id_telefone WHERE id_item = '$idItem'"; 
    $sqlDest = $conn->query($sqlDest) or die($conn->error);  
    while($dados = $sqlDest->fetch_assoc()){
        $idDest = $dados['destinatario'];
        $idTel = $dados['id_telefone'];
    }
    $updateDest = "DELETE FROM destinatario WHERE destinatario.id_destinatario = '$idDest'";
    $updateDest = $conn->query($updateDest) or die($conn->error);
    $updateTel = "DELETE FROM telefone WHERE telefone.id_telefone = '$idTel'";
    $updateTel = $conn->query($updateTel) or die($conn->error);

}

header("Location: itens_emprestados.php");
?>