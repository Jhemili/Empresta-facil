<?php include "head.php";
      include "side-menu.php";
      include "protect.php"; 
?>
    <main>
        <div class="card">
            <div class="container-titulos">
                <h1>Emprestar</h1>
                <h2>Indique o destinatário <br>e data de retorno do item</h2>
            </div>       
            <div class="container container-form-emprestar">
                <form action="" method="POST" name="emprestar">
                    <div class="form-input">
                        <label for="destinatario">Destinatário</label> <input name="destinatario" type="text" required>
                    </div>
                    <div class="form-input">
                        <label for="celular">Contato</label><input name="celular" type="tel" id="celular" maxlength="14" data-js="celular" placeholder="celular" required>
                        <input name="telefone_fixo" type="tel" id="tel-fixo" maxlength="13" data-js="tel_fixo" placeholder="telefone fixo">
                    </div>
                    <div class="form-input">
                        <label for="data-retorno">Data de retorno</label> <input name="dataRetorno" type="date" required>
                    </div>
                    <button type="submit" name="salvar">Salvar</button>             
                </form>
            </div>
        </div>
    </main>
<?php include "scripts.php" ?>
