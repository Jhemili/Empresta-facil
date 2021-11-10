<?php

    include_once("conexao.php");
    
    if(isset($_POST['salvar'])){
        $nome = filter_input(INPUT_POST, 'nome_usuario', FILTER_SANITIZE_STRING);
        $sobrenome = filter_input(INPUT_POST, 'sobrenome', FILTER_SANITIZE_STRING);
        $celular = filter_input(INPUT_POST, 'celular', FILTER_SANITIZE_NUMBER_INT);
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
        $senha = filter_input(INPUT_POST, 'senha');
        $rua = filter_input(INPUT_POST, 'rua', FILTER_SANITIZE_STRING);
        $bairro = filter_input(INPUT_POST, 'bairro', FILTER_SANITIZE_STRING);
        $numero = filter_input(INPUT_POST, 'numero', FILTER_SANITIZE_NUMBER_INT);
        $cep = filter_input(INPUT_POST, 'cep', FILTER_SANITIZE_NUMBER_INT); 

        $usuario = "INSERT INTO usuario (nome_usuario, sobrenome, email, senha) VALUES ('$nome', '$sobrenome', '$email', '$senha')";
        $insereUsuario = mysqli_query($conn,$usuario);
        $lastId = $conn->insert_id;
        
        $telefone = "INSERT INTO telefone (celular,idUsuario) VALUES ($celular,$lastId)";
        $insereTelefone = mysqli_query($conn,$telefone);

        echo "<script>window.location='perfil.php';alert('Dados com sucesso!');</script>";
       
        mysqli_close($conn);

    }
     
    
    
    
?>