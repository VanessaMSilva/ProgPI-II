<?php
// Conecte-se ao banco de dados (substitua os valores com as suas próprias configurações)
include("conexao.php");

// Verifique se a conexão foi bem-sucedida
if ($conexao) {
    // Obtenha o ID da imagem a ser exibida (você pode passar o ID via GET ou POST)
    $id = $_GET['id'];

    // Prepare a consulta SQL para obter a imagem pelo ID
    $query = "SELECT imagem FROM items WHERE id = ?";
    
    // Crie uma declaração preparada
    $stmt = mysqli_prepare($conexao, $query);
    
    // Vincule o parâmetro à declaração preparada
    mysqli_stmt_bind_param($stmt, 'i', $id);
    
    // Execute a declaração preparada
    mysqli_stmt_execute($stmt);
    
    // Obtenha o resultado da consulta
    mysqli_stmt_bind_result($stmt, $imagem);
    
    // Verifique se a imagem foi encontrada
    if (mysqli_stmt_fetch($stmt)) {
        // Defina o cabeçalho da resposta como uma imagem
        header('Content-Type: image/jpeg'); // Altere para o tipo de imagem correto se necessário
        
        // Exiba a imagem
        echo $imagem;
    } else {
        echo 'Imagem não encontrada.';
    }
    
    // Feche a declaração preparada
    mysqli_stmt_close($stmt);
    
    // Feche a conexão com o banco de dados
    mysqli_close($conexao);
} else {
    echo 'Erro ao conectar ao banco de dados.';
}
?>
