<?php include "head.php";
      include "side-menu.php";
      include "conexao.php";
      include "format.php";
      
if(!isset($_SESSION)){
session_start();
}
    
$usuarioAtual = $_SESSION['user'];
$consulta = "SELECT * FROM usuario INNER JOIN telefone ON usuario.telefone = telefone.id_telefone INNER JOIN endereco ON usuario.endereco = endereco.id_endereco WHERE id_usuario = '$usuarioAtual'";
$busca = $conn->query($consulta) or die($conn->error);
     
?>
    <main>
        <div class="card">
            <div class="container-titulos">
                <h1>Perfil</h1>
                <h2>Sua informações pessoais</h2>
            </div>       
            <div class="container container-form-perfil">
                <form action="perfil.php" method="post" name="perfil">
                <?php while($dados = $busca->fetch_assoc()){ ?>
                    <p><h3>Nome: </h3> <?php echo $dados['nome_usuario']." ".$dados['sobrenome'];?></p>
                    <p><h3>E-mail:</h3> <?php echo $dados['email'];?></p>
                    <p><h3>Telefone: </h3> <?php echo format($telefoneMask, $dados['celular']);?></p>
                    <p><h3>Telefone Residencial:</h3> <?php echo format($fixoMask,$dados['telefone_fixo']) ;?></p>
                    <p><h3>Endereço:</h3> <?php echo $dados['rua']." ".$dados['numero'].", ".$dados['bairro'];?></p>
                    <p><h3>Cidade: </h3> <?php echo $dados['cidade']."-".$dados['estado']; ?></p>
                    <p><h3>CEP</h3> <?php echo $dados['CEP'];?></p>
                    
                    <button type="submit" name="editar" id="submit">Editar</button>     
                <?php } ?>        
                </form>
            </div>
        </div>
    </main>
<?php include "footer.php" ?>