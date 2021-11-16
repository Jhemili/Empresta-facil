<?php 

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "Empresta_facil";

//CONEXÃO
$conn = new mysqli($servidor, $usuario, $senha, $dbname);

if($conn->error){
    die("Falha ao conectar banco de dados".$conn->error);    
} 


?>