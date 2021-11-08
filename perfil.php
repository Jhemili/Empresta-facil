<?php include "head.php" ?>
<?php include "side-menu.php"?>
    <main>
        <div class="card">
            <div class="container-titulos">
                <h1>Perfil</h1>
                <h2>Edite e salve suas informações pessoais</h2>
            </div>       
            <div class="container container-form-perfil">
                <form action="" method="post" name="perfil">
                    <div class="form-input">
                        <label for="nome">Nome</label> <input class="nome" type="text" id="text" placeholder="Digite seu nome" required>
                    </div>
                    <div class="form-input">
                        <label for="sobrenome">Sobrenome</label> <input class="sobrenome" type="text" id="sobrenome" placeholder="sobrenome" required>
                    </div>
                    <div class="form-input">
                        <label for="endereco">Endereço</label> <input class="rua" type="text" id="rua" placeholder="rua" required>
                        <input class="bairro" type="text" id="bairro" placeholder="bairro" required>
                        <input class="numero" type="text" id="numero" placeholder="número" required>
                        <input class="cep" type="text" id="cep" pattern="\d{5}-\d{3}$" placeholder="cep 000-000" required>
                    </div>        
                    <button type="submit">Salvar</button>             
                </form>
            </div>
        </div>
    </main>
</body>
</html>