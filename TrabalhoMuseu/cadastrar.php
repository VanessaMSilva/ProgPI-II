<?php
    session_start();
    include("conexao.php");

    $nome = mysqli_real_escape_string($conexao, $_POST['nome']);
    $usuario = mysqli_real_escape_string($conexao, $_POST['usuario1']);
    $senha = mysqli_real_escape_string($conexao, $_POST['senha1']);

    $sql = "select count(*) as total from usuario where usuario = '$usuario'";
    $result = mysqli_query($conexao,$sql);
    $row = mysqli_fetch_assoc($result);

    if($row['total']==1){
        $_SESSION['usuario_existe'] = TRUE;
        header('Location: index.php ');
        exit;
    }

    $sql = "INSERT INTO usuario(nome, usuario,senha,data_cadastro,usuario_gerente) VALUES('$nome','$usuario',md5('{$senha}'),NOW(),false)";

    if($conexao->query($sql)===true){
        $_SESSION['status_cadastro'] = true;
        $_SESSION['usuario'] = $usuario;
    }

    $conexao->close();
    header('Location: index.php');
    exit();
?>