<?php
require_once "verificar_sessao.php";

session_start();
require_once "conexao.php";

$idusuario_logado = $_SESSION['idusuario_logado'];
$idusuario_seguir = $_GET['idusuario_seguir'];

$sql = "INSERT INTO seguir (idusuario_logado, idusuario_seguir) VALUES ('$idusuario_logado', '$idusuario_seguir')";

mysqli_query($conexao, $sql);

header("Location: index.php");
?>