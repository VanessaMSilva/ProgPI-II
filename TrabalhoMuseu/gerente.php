<?php
    include("conexao.php");
    
    //$usuario = mysqli_real_escape_string($conexao, $'usuario']);
    if (isset($_SESSION['usuario'])) {
        $nome = $_SESSION['usuario'];
        $query = "SELECT usuario_gerente FROM usuario WHERE usuario='$nome'";
        $result = mysqli_query($conexao, $query);
        while ($dado = $result->fetch_array()) {
            return $dado["usuario_gerente"];
        }  
    }
    return 0;
?>