<?php
    include('conexao.php');

    if(isset($_POST['email']) or isset($_POST['senha'])){
        if(strlen($_POST['email']) == 0){
            echo"Preencha seu email";
        } else if(strlen($_POST['senha']) == 0){
            echo "Preencha sua senha";
        } else {
            $email = $conn->real_escape_string($_POST['email']);
            $senha = $conn->real_escape_string($_POST['senha']);

            $sql_busca = "SELECT * FROM usuario WHERE email = '$email' AND senha = '$senha'";
            $sql_busca = $conn->query($sql_busca) or die($conn->error);

            $resultado = $sql_busca->num_rows;

            if($resultado == 1){
                $usuario = $sql_busca->fetch_assoc();

                if(!isset($_SESSION)){
                    session_start();
                }

                $_SESSION['user'] = $usuario['id_usuario'];
                $_SESSION['name'] = $usuario['nome_usuario'];

                header("Location: itens_emprestados.php");

            } else {
                $_SESSION["erro"] = "usuário ou senha incorreto!";
                
            }
        }
    }
?> 
<?php include "head.php" ?>
<main>
    <div class="card">
        <div class="container-titulos">
            <h1>Bem vindo de volta!</h1>
            <h2>Log in para continuar.</h2>
        </div>       
        <div class="container">
            <form action="" method="POST" name="login">
                <div class="form-input">
                    <label for="email">E-mail</label>
                    <input class="email" type="email" name="email" placeholder="Digite o e-mail" required>
                </div>
                <div class="form-input">
                    <label for="senha">Senha</label>
                    <input class="senha" type="password" name="senha" required>
                    <?php 
                        if(isset($_SESSION["erro"])){
                            echo $_SESSION["erro"];
                        }
                    ?>
                </div>           
                <button type="submit">Entrar</button>
                <span class="msg-cadastro"><a href="cadastro.php">Novo por aqui? Cadastre-se</a></span>             
            </form>
        </div>
    </div>
</main>