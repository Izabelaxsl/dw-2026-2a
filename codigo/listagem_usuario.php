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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-B/GM4XqrwHnWXNOWMbloTmrYXZg10cakYGmpfsR/bbzQ6JAJI4ihuyADKLnBgrCe" crossorigin="anonymous">
    <script type="module" src="https://cdn.jsdelivr.net/npm/bootstrap@6.0.0-alpha.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-1a/pXj49ZQ1aHEmrJ+gMw1otqoVsYwlEnlD8mIfY2TV03r20Y0CN7uqx1tQogjPL" crossorigin="anonymous"></script>
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