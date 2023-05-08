
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
    <section>
        <div id='formulario'>
            <div>
                <p>Login realizado com sucesso!</p>
            </div>
            <div>
                <form action="cadastrar.php" method="POST">
                    <div>
                        <input type="text" name='nome' placeholder="Nome">
                    </div>
                    <div>
                        <input type="text" name='email' placeholder="email">
                    </div>
                    <div>
                        <input type="text" name='senha' placeholder="senha">
                    </div>
                    <div>
                        <input type="submit">
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>