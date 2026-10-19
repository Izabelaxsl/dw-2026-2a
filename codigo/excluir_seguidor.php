<?php 
require_once "verificar_sessao.php";
require_once "conexao.php";

$seguir = $_GET['id'];
$idusuario_seguindo= $_SESSION['idusuario'];

 $sql = "DELETE FROM seguir WHERE idseguidor = '$idusuario_seguindo' AND idseguindo = '$seguir'";


mysqli_query($conexao, $sql);

header("Location: listagem_usuario.php");
?>
