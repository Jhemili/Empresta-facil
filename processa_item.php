<?php 
include "conexao.php";
include "protect.php";

if(!isset($_SESSION)){
    session_start();
}

$idUsuario = $_SESSION['user'];

if(isset($_POST['cadastrar']))
{
    $itemNome = filter_input(INPUT_POST,'item_nome', FILTER_SANITIZE_STRING);
    $itemDescricao = filter_input(INPUT_POST, 'item_descricao', FILTER_SANITIZE_STRING);

    $sqlItem = "INSERT INTO itens(nome_item, descricao,usuario) VALUES ('$itemNome','$itemDescricao', $idUsuario)";

    $insereItem = mysqli_query($conn,$sqlItem);

    echo "<script>window.location='inventario.php';alert('Item cadastrado com sucesso!');</script>"; 

}


?>