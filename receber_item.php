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
    $updateItem = $conn->query($updateItem);

}

header("Location: itens_emprestados.php");
?>