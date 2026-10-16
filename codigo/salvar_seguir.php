<?php 




require_once "verificar_sessao.php";
require_once "conexao.php";

$seguir = $_GET['id'];
$idusuario_seguindo= $_SESSION['idusuario'];

$sql = "INSERT INTO seguir (idseguidor, idseguindo) VALUES ('$seguir', '$idusuario_seguindo')";

mysqli_query($conexao, $sql);

header("Location: listagem_usuario.php");
?>