<?php
require_once "verificar_sessao.php";

session_start();
require_once "conexao.php";

$validacao = "SELECTE FROM seguir WHERE idseguidor = $_SESSION['idusuario_logado'] and idseguindo = $seguidor_seguir";

$idusuario_logado = $_SESSION['idusuario_logado'];


$sql = "INSERT INTO seguir (idusuario_logado, idusuario_seguir, idusuario_seguindo) VALUES ('$idusuario_logado', '$idusuario_seguir', '$idusuario_seguindo')";

mysqli_query($conexao, $sql);

header("Location: index.php");
?>