<div class="side-menu">
    <div id="menu" onclick="onClickMenu()">
        <span class="line" id="line1"></span>
        <span class="line" id="line2"></span>
        <span class="line" id="line3"></span>
    </div>    
    <ul class="nav" id="nav">
        <li><a href="inventario.php">Inventário</a></li>
        <li><a href="itens_emprestados.php">Itens Emprestados</a></li>
        <li><a href="perfil_edit.php">Perfil</a></li>
        <li><a href="logout.php">Sair</a></li>
    </ul>    
</div>



<script>
    function onClickMenu(){
    document.getElementById("menu").classList.toggle("change");
    document.getElementById("nav").classList.toggle("change");
    }
</script>