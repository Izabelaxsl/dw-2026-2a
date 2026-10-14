<?php
require_once "verificar_sessao.php";
require_once "conexao.php";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo.css">
</head>

<body>

    <?php
    $sql = "SELECT idusuario,nome,foto FROM usuario";

    $resultado = mysqli_query($conexao, $sql);

    while ($usuario = mysqli_fetch_array($resultado)) {
        $idusuario = $usuario['idusuario'];
        $nome = $usuario['nome'];
        $foto = $usuario['foto'];

        echo "<img src='$foto'>";
        echo"<br>";
        echo "<p class=''>$nome</p>";
        echo "<a href='salvar_.php?id=$idusuario'> seguir </a>";
    }

    ?>
</body>

</html>