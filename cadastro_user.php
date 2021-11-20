<?php 
     include("conexao.php");
    
     if(isset($_POST['cadastrar'])){
         $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
         $senha = filter_input(INPUT_POST, 'senha');
         
         if($email){
             $sql = "SELECT * FROM usuario WHERE email = '$email'";
             $sql = mysqli_query($conn,$sql);
 
             $resultado = $sql->num_rows;
 
             if($resultado == 0){
         
                 $usuario = "INSERT INTO usuario (email, senha) VALUES ('$email', '$senha')";
                 $insereUsuario = mysqli_query($conn,$usuario);
         
         
                 echo "<script>window.location='perfil.php';alert('Cadastro feito com sucesso!');</script>";
 
             } else {
                 
                 $_SESSION["erroCadastro"] = "usuário já cadastrado";
                 
             }
         }
 
     } 
?>
<?php include "head.php";?>
<main>
    <div class="card">
        <div class="container-titulos">
            <h1>Cadastro</h1>
            <h2>Salve suas informações pessoais</h2>
        </div>       
        <div class="container container-form-perfil">
            <form action="" method="POST" name="cadastro">
                <div class="form-input">
                    <label for="email">Email</label><input name="email" type="email" required>
                    <span class="erro"><?php if(isset($_SESSION["erroCadastro"])){echo $_SESSION["erroCadastro"];}?></span>                    
                </div>
                <div class="form-input">
                    <label for="senha">Senha</label><input name="senha" type="password" required>
                </div>
                <button type="submit" name="cadastrar" id="cadastrar">Cadastrar</button> 
            </form>
        </div>
    </div>
</main>
<?php include "footer.php" ?>
