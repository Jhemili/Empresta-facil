<?php require "conexao.php";
      require_once "protect.php"; 
      
if(!isset($_SESSION)){
session_start();
}
$idUsuario = $_SESSION['user'];
$sqlId = "SELECT telefone, endereco FROM usuario WHERE id_usuario = '$idUsuario'";
$sqlId = $conn->query($sqlId) or die($conn->error);
$resultado = $sqlId->num_rows;

if($resultado == 1){
    $usuario = $sqlId->fetch_assoc();
    $_SESSION['userEndereco'] = $usuario['endereco'];
    $_SESSION['userTelefone'] = $usuario['telefone'];
}

$idEndereco = $_SESSION['userEndereco'];
$idTelefone = $_SESSION['userTelefone'];

    
if(isset($_POST['salvar'])){
    $nome = filter_input(INPUT_POST, 'nome_usuario', FILTER_SANITIZE_STRING);
    $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
    $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_NUMBER_INT);
    $sanitCelular = str_replace('-','',$celular); 
    $sanitCelular = trim($sanitCelular);
    $telefone_fixo = filter_input(INPUT_POST, 'telefone_fixo', FILTER_SANITIZE_NUMBER_INT);
    $sanitTel = str_replace('-','',$telefone_fixo); 
    $sanitTel = trim($sanitTel);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $senha = filter_input(INPUT_POST, 'senha');
    $rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
    $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
    $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
    $estado = filter_input(INPUT_POST, 'estado', FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT); 
    $sanitCep = str_replace('-','',$cep);
    $sanitCep = trim($sanitCep);

    
    $endereco = "UPDATE endereco SET rua = '$rua', bairro = '$bairro', cidade = '$cidade', numero = '$numero',estado = '$estado', CEP = '$sanitCep' WHERE id_endereco = '$idEndereco'";
    $updateEndereco = mysqli_query($conn,$endereco);


    $telefone = "UPDATE telefone SET celular = '$sanitCelular', telefone_fixo = '$sanitTel' WHERE id_telefone = '$idTelefone'";
    $updateTelefone = mysqli_query($conn,$telefone);
  

    $usuario = "UPDATE usuario SET nome_usuario = '$nome', sobrenome = '$sobrenome', email = '$email', senha = '$senha' WHERE id_usuario = '$idUsuario'";
    $updateUsuario = mysqli_query($conn,$usuario);
    
    header("Location: perfil_edit.php");

} 

?>