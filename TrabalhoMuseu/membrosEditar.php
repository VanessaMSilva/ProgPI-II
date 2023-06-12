<?php
include('conexao.php');
// Verifique se o ID do item foi enviado através do formulário
if (isset($_POST['item_id'])) {

  // Recupere o ID do item a ser deletado
  $itemId = $_POST['item_id'];
  if($_POST['item_id2']==0){
    $itemId2 = 1;
  }else{
    $itemId2 = 0;
  }

  // Construa a consulta SQL de exclusão
    $sql = "UPDATE usuario SET usuario_gerente = '$itemId2' WHERE usuario = '$itemId'";

  // Execute a consulta SQL
  if (mysqli_query($conexao, $sql)) {
  } else {
  }

  // Feche a conexão com o banco de dados
  mysqli_close($conexao);
  header('Location: index.php');
  exit();
}
?>



