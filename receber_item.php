<?php 
      include "conexao.php";
      include "head.php";
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
 
    $sqlDest = "SELECT destinatario FROM itens WHERE id_item = '$idItem'"; 
    $sqlDest = $conn->query($sqlDest) or die($conn->error);  
    while($dados = $sqlDest->fetch_assoc()){
        $idDest = $dados['destinatario'];
    }
    $updateDest = "DELETE FROM destinatario WHERE destinatario.id_destinatario = '$idDest'";
    $updateDest = $conn->query($updateDest)or die($conn->error);


}

header("Location: itens_emprestados.php");
?>