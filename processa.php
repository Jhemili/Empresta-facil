<?php

include_once("conexao.php");

$nome = filter_input(INPUT_POST, 'nome_usuario', FILTER_SANITIZE_STRING);
$sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
$celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_NUMBER_INT);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
$bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
$numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
$cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT);



"INSERT INTO endereco (logradouro, bairro, numero, CEP) VALUES ($rua, $bairro, $numero, $cep)";
"INSERT INTO usuario (nome_usuario, sobrenome, email, senha, telefone, endereco 
) VALUES ($nome, $sobrenome, $email, $senha, $telefone, $endereco)"


?>