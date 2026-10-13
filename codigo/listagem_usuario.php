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
        echo "<a href='salvar.php? $idusuario'> seguir </a>";
    }


    ?>
