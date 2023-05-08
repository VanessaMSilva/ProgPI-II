<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>
    <header class="inicio">
        <div class="Container Flex">
            <div id="logo"><a href="index.html">Museu</a>
            </div>
            <nav>
                <input type="checkbox" id="check">
                <label id="label" for="check">&#x268c;</label>
                <ul class="menu">
                    <li><a href="login.php">Login</a></li>
                    <li><a href="atividades.html">Cadastro</a></li>
                    <li><a href="contatos.html">Inicio</a></li>
                    <li><a href="localizacao.html">Atividades</a></li>

                </ul>
            </nav>
        </div>
    </header>
    <?php
    // fazer a conexão com o banco de dados
    $mysqli = new mysqli("localhost", "usuario", "senha", "banco_de_dados");

    // checar se houve algum erro na conexão
    if ($mysqli->connect_error) {
        die('Erro ao conectar ao banco de dados: ' . $mysqli->connect_error);
    }

    // fazer a consulta ao banco de dados
    $resultado = $mysqli->query("SELECT * FROM visitantes");

    // exibir as mensagens dos visitantes em uma lista
    echo '<ul>';
    while ($row = $resultado->fetch_assoc()) {
        echo '<li><strong>' . $row['nome'] . ':</strong> ' . $row['mensagem'] . '</li>';
    }
    echo '</ul>';
    ?>
</body>

</html>