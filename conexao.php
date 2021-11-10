<?php 

$servidor = "localhost";
$usuario = "root";
$senha = "";
$dbname = "Empresta_facil";

//CONEXÃO
$conn = mysqli_connect($servidor, $usuario, $senha, $dbname);

if($conn->connect_errno){echo "Erro";} 


?>