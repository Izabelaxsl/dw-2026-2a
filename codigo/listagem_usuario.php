<?php
require_once "verificar_sessao.php";
require_once "conexao.php";

$sql = "SELECT idusuario,nome,foto FROM usuario";

$resultado = mysqli_query($conexao, $sql);

while ($usuario = mysqli_fetch_array($resultado)) {
    $idusuario = $usuario['idusuario'];
    $nome = $usuario['nome'];
    $foto = $usuario['foto'];

    echo $foto;
    "<br>";
    echo $nome;
    echo "<a href='salvar_.php? $idusuario'> seguir </a>";
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <lin
</head>
<body>
    
</body>
</html>
