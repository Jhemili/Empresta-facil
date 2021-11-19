<?php include "head.php";

?>

    <main>
        <div class="card">
            <div class="container-titulos">
                <h1>Cadastro</h1>
                <h2>Salve suas informações pessoais</h2>
            </div>       
            <div class="container container-form-perfil">
                <form action="processa_cadastro.php" method="post" name="perfil">
                    <div class="form-input">
                        <label for="nome">Nome</label> <input name="nome_usuario" type="text" id="text" placeholder="Digite seu nome" maxlength="45" required>
                    </div>
                    <div class="form-input">
                        <label for="sobrenome">Sobrenome</label> <input name="sobrenome" type="text" id="sobrenome" maxlength="45" placeholder="sobrenome" required>
                    </div>
                    <div class="form-input">
                        <label for="celular">Celular</label><input name="celular" type="tel" id="celular" minlength="14" maxlength="14" data-js="celular">
                        <label for="fixo">Telefone Residencial</label><input name="telefone_fixo" type="tel" minlength="13" id="tel_fixo" maxlength="13" data-js="tel_fixo">
                    </div>
                    <div class="form-input">
                        <label for="email">Email</label><input name="email" type="email" required data-js="email">
                    </div>
                    <div class="form-input">
                        <label for="senha">Senha</label><input name="senha" type="password" required data-js="senha">
                    </div>
                    <div class="form-input">
                        <label for="rua">Endereço</label><input name="rua" type="text" id="rua" placeholder="rua" required>
                        <label for="bairro"></label> <input name="bairro" type="text" id="bairro" placeholder="bairro" required>
                        <label for="cidade"></label><input name="cidade" type="text" class="cidade" id="cidade" placeholder="cidade" required>
                        <label for="numero"></label><input name="numero" type="text" class="numero" id="numero" placeholder="número" required>
                        <label for="estado"></label><input name="estado" type="text" class="estado" id="estado" placeholder="estado" required>
                        <label for="cep"></label><input name="cep" type="text" class="cep" id="cep" placeholder="cep" minlength="9" maxlength="9" data-js="cep" required>
                    </div>        
                    <button type="submit" name="salvar" id="submit">Salvar</button> 
                </form>
            </div>
        </div>
    </main>
<?php include "footer.php" ?>

