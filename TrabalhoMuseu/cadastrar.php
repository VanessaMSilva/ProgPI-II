<?php
    session_start();
    include("conexao.php");

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $usuario = mysqli_real_escape_string($conexao, $_POST['email']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha']);

    $sql = "select count(*) as total from usuario where usuario = '$usuario'";
    $result = mysqli_query($sql);
    $row = mysqli_fetch_assoc($result);

    if($row['total']==1){
        $_SESSION['usuario_existe'] = TRUE;
        header('Location: cadastro.php ');
        exit;
    }

    $sql = "INSERT INTO usuario(nome, usuario,'$senha',NOW())";

    if($conexao->query($sql)==true){
        $_SESSION['status_cadastro'] = true;
    }

    $conexao->close();

    header('Location: cadastro.php');
    exit;
?>