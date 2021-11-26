<?php 
    require "conexao.php";

if(!isset($_SESSION)){session_start();}

if(isset($_POST['salvar']))
{   
    $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_NUMBER_INT);
    $sanitCelular = str_replace('-','',$celular); 
    $sanitCelular = trim($sanitCelular);

    $telefone_fixo = filter_input(INPUT_POST, 'telefone_fixo', FILTER_SANITIZE_NUMBER_INT);
    $sanitTel = str_replace('-','',$telefone_fixo); 
    $sanitTel = trim($sanitTel);

    $destinatario = filter_input(INPUT_POST,'destinatario', FILTER_SANITIZE_STRING);
            
    $dataRetorno = filter_input(INPUT_POST,'dataRetorno');
    $saniData = str_replace('-','',$dataRetorno); 
    $saniData = trim($saniData);
    

    $now = new DateTime();
    $now = $now->format('Ymd');  
    $idItem = filter_input(INPUT_POST, 'idItem');


    $sqlTel = "INSERT INTO telefone (celular, telefone_fixo) VALUES ('$sanitCelular', '$sanitTel')";
    $sqlTel = $conn->query($sqlTel);
    $idTelefone = $conn->insert_id; 

    $sqlDestinatario = "INSERT INTO destinatario (nome_destinatario, telefone) VALUES ('$destinatario', '$idTelefone')";
    $sqlDestinatario = $conn->query($sqlDestinatario);
    $idDestinatario = $conn->insert_id;

    $updateItem = "UPDATE itens SET estatus = 1, destinatario = '$idDestinatario', data_retorno = '$saniData', data_emprestimo = '$now' WHERE id_item = '$idItem'"; 
    $updateItem = $conn->query($updateItem);

}

header("Location: inventario.php");

?>