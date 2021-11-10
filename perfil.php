<?php include "head.php" ?>
<?php include "side-menu.php"?>
    <main>
        <div class="card">
            <div class="container-titulos">
                <h1>Perfil</h1>
                <h2>Edite e salve suas informações pessoais</h2>
            </div>       
            <div class="container container-form-perfil">
                <form action="processa_perfil.php" method="post" name="perfil">
                    <div class="form-input">
                        <label for="nome">Nome</label> <input name="nome_usuario" type="text" id="text" placeholder="Digite seu nome" maxlength="45" required>
                    </div>
                    <div class="form-input">
                        <label for="sobrenome">Sobrenome</label> <input name="sobrenome" type="text" id="sobrenome" maxlength="45" placeholder="sobrenome" required>
                    </div>
                    <div class="form-input">
                        <label for="celular">Celular</label><input name="celular" type="tel" id="celular" maxlength="14" data-js="celular">
                    </div>
                    <div class="form-input">
                        <label for="email">Email</label><input name="email" type="email" required data-js="email">
                    </div>
                    <div class="form-input">
                        <label for="senha">Senha</label><input name="senha" type="password" required data-js="senha">
                    </div>
                    <div class="form-input">
                        <label for="endereco">Endereço</label> <input name="rua" type="text" id="rua" placeholder="rua" required>
                        <input name="bairro" type="text" id="bairro" placeholder="bairro" required>
                        <input name="numero" type="text" id="numero" placeholder="número" required>
                        <input name="cep" type="text" id="cep" placeholder="cep" maxlength="9" data-js="cep" required>
                    </div>        
                    <button type="submit" name="salvar" id="submit">Salvar</button>             
                </form>
            </div>
        </div>
    </main>
<?php include "footer.php" ?>
