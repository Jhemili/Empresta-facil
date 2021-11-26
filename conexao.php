<?php 

define ("SERVIDOR", "localhost");
define ("USUARIO", "root");
define ("SENHA", null);
define ("BANCODEDADOS","Empresta_facil");

//CONEXÃO
$conn = new mysqli(SERVIDOR, USUARIO, SENHA, BANCODEDADOS) or die("Erro ao conectar: ". $conn->connect_error);

?>