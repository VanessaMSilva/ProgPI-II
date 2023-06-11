<?php
// Verifique se o formulário foi enviado
if (isset($_POST['submit'])) {
    // Verifique se todos os campos estão preenchidos
    if (isset($_FILES['imagem']) && isset($_POST['texto']) && isset($_POST['titulo'])) {
        // Conecte-se ao banco de dados (substitua os valores com as suas próprias configurações)

        include("conexao.php");

        // Verifique se a conexão foi bem-sucedida
        if ($conexao) {
            // Obtenha o conteúdo da imagem
            $imagem = file_get_contents($_FILES['imagem']['tmp_name']);

            // Prepare a consulta SQL
            $query = "INSERT INTO items (imagem, texto,titulo,autor) VALUES (?, ?,?,?)";

            // Crie uma declaração preparada
            $stmt = mysqli_prepare($conexao, $query);

            // Vincule os parâmetros à declaração preparada
            mysqli_stmt_bind_param($stmt, 'ssss', $imagem, $_POST['texto'],$_POST['titulo'],$_POST['autor']);

            // Execute a declaração preparada
            mysqli_stmt_execute($stmt);

            // Verifique se a inserção foi bem-sucedida
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                echo 'Item salvo com sucesso.';
            } else {
                echo 'Falha ao salvar o item.';
            }

            // Feche a declaração preparada
            mysqli_stmt_close($stmt);

            // Feche a conexão com o banco de dados
            mysqli_close($conexao);
        } else {
            echo 'Erro ao conectar ao banco de dados.';
        }
    } else {
        echo 'Por favor, preencha todos os campos.';
    }
}
