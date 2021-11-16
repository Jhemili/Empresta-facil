<?php require "conexao.php";

$sqlUser = "SELECT * FROM usuario WHERE idUsuario=17 INNER JOIN endereco ON idUsuario = idEndereco";
$sqlTel = "SELECT * FROM telefone WHERE idUsuario = 17";
$sqlEndereco = "SELECT * FROM endereco WHERE idUsuario = 17";

$usuario = $conn -> query($sqlUser);
$telefone = $conn -> query($sqlTel);
$endereco = $conn -> query($sqlEndereco);



$sql = mysqli_query($conn, $sqlUser);
while($col = mysqli_fetch_assoc($sql)){
    $nome_usuario = $col['nome_usuario'];
    $sobrenome = $col['sobrenome'];
    $email = $col['email'];
    
}
mysqli_close($conn);

?>