<?php
session_start();
include("conexao.php");

if(empty($_POST['textarea'])) {
	header('Location: index.php');
	exit();
}

$usuario = mysqli_real_escape_string($conexao, $_SESSION['usuario']);
$mens = mysqli_real_escape_string($conexao, $_POST['textarea']);

$sql = "INSERT INTO mensagens(nome, Mensagem, data) VALUES('$nome','$mens',NOW())";


if($conexao->query($sql)===true){
    $_SESSION['mensagem'] = true;
}

$conexao->close();
header('Location: index.php');
exit();
?>