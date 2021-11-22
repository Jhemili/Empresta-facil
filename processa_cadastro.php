<?php

    include("conexao.php");
    
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

        
        if($email){
            $sql = "SELECT * FROM usuario WHERE email = '$email'";
            $sql = $conn->query($sql);

            $resultado = $sql->num_rows;

            if($resultado == 0){

                $endereco = "INSERT INTO endereco (rua,bairro,cidade,numero,estado,CEP) VALUES ('$rua','$bairro','$cidade','$numero','$estado','$sanitCep')";
                $insereEndereco = mysqli_query($conn,$endereco);
                $idEndereco = $conn->insert_id;
                

                $telefone = "INSERT INTO telefone (celular,telefone_fixo) VALUES ('$sanitCelular', '$sanitTel')";
                $insereTelefone = mysqli_query($conn,$telefone);
                $idTelefone = $conn->insert_id;
                

        
                $usuario = "INSERT INTO usuario (nome_usuario, sobrenome, email, senha,telefone,endereco) VALUES ('$nome', '$sobrenome', '$email', '$senha','$idTelefone','$idEndereco')";
                $insereUsuario = mysqli_query($conn,$usuario);
        
        
                echo "<script>window.location='perfil.php';alert('Dados salvos com sucesso!');</script>"; 

            } else {
                echo "<script>window.location='login.php';alert('Usuario já cadastrado')</script>";
            }
        } 

    } 
    
?>