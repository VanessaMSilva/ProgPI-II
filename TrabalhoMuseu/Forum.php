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
                    <li><a href="atividades.html">Atividades</a></li>
                    <li><a href="contatos.html">Inicio</a></li>
                    <li><a href="localizacao.html">Atividades</a></li>

                </ul>
            </nav>
        </div>
    </header>
    <section>
        <div id="formulario">
            <div>
            <form method="post" action="salvar.php">
                <div><label for="nome">Nome:</label></div>
                <div><input type="text" id="nome" name="nome" required></div>

                <div><label for="email">Email:</label></div>
                <div><input type="email" id="email" name="email" required></div>

                <div><label for="mensagem">Mensagem:</label></div>
                <div><textarea id="mensagem" name="mensagem" required></textarea></div>

                <input type="submit" value="Enviar"></div>
            </form>
            </div>
        </div>
    </section>
</body>

</html>