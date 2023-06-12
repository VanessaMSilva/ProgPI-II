<?php
include('conexao.php');
// Verifique se o ID do item foi enviado através do formulário
if (isset($_POST['item_id'])) {

  // Recupere o ID do item a ser deletado
  $itemId = $_POST['item_id'];

  // Construa a consulta SQL de exclusão
  $sql = "DELETE FROM usuario WHERE usuario = '$itemId'";

  // Execute a consulta SQL
  if (mysqli_query($conexao, $sql)) {
  } else {
  }

  // Feche a conexão com o banco de dados
  mysqli_close($conexao);
  header('Location: membros.php');
  exit();
}
?>
