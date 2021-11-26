<?php 
      require "conexao.php";
      include "protect";
      include "head.php";
      include "side-menu.php";
      include "format.php";

      if(!isset($_SESSION)){
        session_start();
    }
    $idUsuario = $_SESSION['user'];
    $sql = "SELECT * FROM usuario INNER JOIN telefone ON usuario.telefone = telefone.id_telefone INNER JOIN endereco ON usuario.endereco = endereco.id_endereco WHERE id_usuario = '$idUsuario'";
    $busca = $conn->query($sql) or die($conn->error);

    while($dados = $busca->fetch_assoc())
    {   
        $nome = $dados['nome_usuario'];
        $sobrenome = $dados['sobrenome'];
        $email = $dados['email'];
        $senha = $dados['senha'];
        $rua = $dados['rua'];
        $bairro = $dados['bairro'];
        $cidade = $dados['cidade'];
        $estado = $dados['estado'];
        $cep = format($cepMask,$dados['CEP']);
        $numero = $dados['numero'];
        $celular = format($celularMask,$dados['celular']);
        if(!empty($dados['telefone_fixo'])){
            $telFixo = format($fixoMask,$dados['telefone_fixo']);
        } else {
            $telFixo = "";
        }

    }

?>

    <main>
        <div class="card">
            <div class="container-titulos">
                <h1>Perfil</h1>
                <h2>Edite e salve suas informações pessoais</h2>
            </div>       
            <div class="container container-form-perfil">
                <form action="salva_perfil_edit.php" method="POST" name="salvaPerfil">
                    <div class="form-input">
                        <label for="nome">Nome</label> <input name="nome_usuario" type="text" id="text" value="<?php echo $nome?>" maxlength="45" required>
                    </div>
                    <div class="form-input">
                        <label for="sobrenome">Sobrenome</label> <input name="sobrenome" type="text" id="sobrenome" maxlength="45" value="<?php echo $sobrenome ?>" required>
                    </div>
                    <div class="form-input">
                        <label for="celular">Celular</label><input name="celular" type="tel" id="celular" maxlength="14" value="<?php echo $celular?>" data-js="celular">
                        <label for="fixo">Telefone Residencial</label><input name="telefone_fixo" maxlength="13" type="tel" value="<?php echo $telFixo?>" data-js="tel_fixo">
                    </div>
                    <div class="form-input">
                        <label for="email">Email</label><input name="email" type="email" value="<?php echo $email ?>" required>
                    </div>
                    <div class="form-input">
                        <label for="senha">Senha</label><input name="senha" value="<?php echo $senha ?>" required>
                    </div>
                    <div class="form-input">
                        <label for="rua">Endereço</label><input name="rua" type="text" id="rua" value="<?php echo $rua?>" required>
                        <label for="numero"></label><input name="numero" type="text" class="numero" id="numero" value="<?php echo $numero?>" required>
                        <label for="bairro"></label> <input name="bairro" type="text" id="bairro" value="<?php echo $bairro?>" required>
                        <label for="cidade"></label><input name="cidade" type="text" class="cidade" id="cidade" value="<?php echo $cidade?>" required>
                        <label for="estado"></label><input name="estado" type="text" class="estado" id="estado" value="<?php echo $estado?>" required>
                        <label for="cep"></label><input name="cep" type="text" class="cep" id="cep" value="<?php echo $cep?>" minlength="9" maxlength="9" data-js="cep" required>
                    </div>        
                    <button type="submit" name="salvar" id="salvar">Salvar</button> 
                </form>
            </div>
        </div>
    </main>
<?php include "scripts.php" ?>