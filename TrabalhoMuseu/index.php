<?php
session_start();
include("conexao.php");
$consulta = "SELECT * FROM mensagens;";
$result = mysqli_query($conexao, $consulta);
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Login - PHP + MySQL - Museu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg">
        <a class="navbar-brand" href="index.php">
            <img src="imagens/museu" id="img" class="d-inline-block align-top" alt="">
            Museu
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Link</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" href="#">Disabled</a>
                </li>
            </ul>
            <div id="direita" class="form-inline my-2 my-lg-0">
                <?php
                if (isset($_SESSION['usuario'])) {
                    echo '<a class="nav-link disabled" style="color:white;" href="#">', $_SESSION["usuario"], '</a><a class="btn btn-outline-success my-2 my-sm-0" style="color:white; border-color: white;" href="logout.php">Logout</a>';
                } else {
                    echo '
                    <button class="btn btn-outline-success my-2 my-sm-0" id="login" data-target="#meuModal" data-toggle="modal" style="color:white;border-color: white; margin-right: 20px;">Login</button><button class="btn btn-outline-success my-2 my-sm-0" style="color:white;border-color: white;" id="cadastro" data-target="#meuModalCadastro" data-toggle="modal">Cadastro</button>';
                }
                ?>
            </div>
        </div>
    </nav>



    <section class="corpo">
        <div class="modal fade" id=meuModal>
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Login</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="container has-text-centered">
                            <div class="column is-4 is-offset-4">

                                <?php
                                if (isset($_SESSION['nao_autenticado'])) :
                                ?>
                                    <script>
                                        alert("ERRO: Usuário ou senha inválidos.");
                                    </script>
                                <?php
                                endif;
                                unset($_SESSION['nao_autenticado']);
                                ?>
                                <div class="box">
                                    <form action="login.php" method="POST">
                                        <div class="field">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nome usuario</label>
                                                <input type="text" name="usuario" class = "form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                                <small id="emailHelp" class="form-text text-muted">Nunca compartilharemos seu e-mail com mais ninguém.</small>
                                            </div>
                                        </div>

                                        <div class="field">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Senha</label>
                                                <input type="password" name="senha" class = "form-control" id="exampleInputPassword1" placeholder="Senha">
                                            </div>
                                        </div>
                                        <button type="submit" class="btn btn-primary">Login</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section>
        <div class="modal fade" id=meuModalCadastro>
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Cadastro</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="container has-text-centered">
                            <div class="column is-4 is-offset-4">
                                <?php
                                if (isset($_SESSION['status_cadastro'])) :
                                ?>
                                    <script>
                                        alert("Cadastrado com sucesso.");
                                    </script>
                                <?php
                                endif;
                                unset($_SESSION['status_cadastro']);
                                ?>
                                <?php
                                if (isset($_SESSION['usuario_existe'])) :
                                ?>
                                    <script>
                                        alert("ERRO: Cadastro Usuário ou senha inválidos.");
                                    </script>
                                <?php
                                endif;
                                unset($_SESSION['usuario_existe']);
                                ?>
                                <div class="box">
                                    <form action="cadastrar.php" method="POST">
                                        <div class="field">
                                            <div class="form-group">
                                                <label for="exampleInputnome">Nome</label>
                                                <input type="text" name="nome" class="form-control" id="exampleInputnome" aria-describedby="Nome" placeholder="Enter nome">
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Nome usuario</label>
                                                <input type="text" name="usuario1" class="form-control" id="exampleInputEmail" aria-describedby="NomeUsuario" placeholder="Enter usuario">
                                            </div>
                                        </div>

                                        <div class="field">
                                            <div class="field">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword">Senha</label>
                                                    <input type="password" name="senha1" class="form-control" id="exampleInputPassword" placeholder="Senha">
                                                </div>
                                            </div>

                                        </div>
                                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    if (isset($_SESSION['nao_autenticado'])) :
    ?>
        <div class="notification is-danger">
            <p>ERRO: Usuário ou senha inválidos.</p>
        </div>
    <?php
    endif;
    unset($_SESSION['nao_autenticado']);
    ?>

    <section>
        <div class="container-fluid" id="cabecalho">
            <div>
                <h1>Museu virtual</h1>
                <h2>19/05/2023</h2>
            </div>
        </div>
    </section>
    <section>
        <div class="container">
            <div class="d-flex align-items-center">
                <div><img class="imagem" src="imagens/Grito.jpg" alt="Imagem"></div>
                <div>
                    <h1>Quadro grito</h1>
                    <h2>criado por Van Gov</h2>
                    <p>O quadro "O Grito" é uma icônica obra de arte do pintor norueguês Edvard Munch, criada em 1893. É considerada uma das pinturas mais famosas e influentes do movimento expressionista.

                        A pintura retrata uma figura solitária em um cenário desolado e surreal. No centro do quadro, há uma figura andrógina com uma expressão de profundo desespero. Seu rosto é contorcido em uma máscara de angústia, com a boca aberta em um grito silencioso. As mãos da figura estão posicionadas nos ouvidos, como se tentasse bloquear algum som aterrorizante.

                        O ambiente ao redor da figura é sombrio e tumultuado. O céu e a água têm tonalidades vibrantes e perturbadoras de laranja e amarelo, criando um contraste intenso com a figura principal. As formas ao redor da figura parecem distorcidas e onduladas, evocando uma sensação de ansiedade e instabilidade.

                        "O Grito" é uma representação poderosa da angústia e da alienação humana. Munch criou a pintura como uma expressão pessoal de suas próprias lutas emocionais e existenciais. A obra captura a sensação de desespero e impotência que muitos indivíduos experimentam em algum momento de suas vidas, tornando-se um símbolo universal de angústia e inquietude.

                        Existem várias versões de "O Grito", incluindo pinturas a óleo, pastéis e litografias. A obra tem sido objeto de inúmeras interpretações e análises ao longo dos anos, e sua imagem se tornou um ícone cultural, reconhecido em todo o mundo.</p>
                </div>
            </div>
        </div>
    </section>
    <section>
        <div class="container mensagem">
            <?php
            if (isset($_SESSION["usuario"])) :
            ?>

                <div>
                    <form class="validated" action="mensagem.php" method="POST">
                        <div class="mb-3">
                            <label for="Textarea" class="form-label">
                                <input type="text" name="nome1" class="form-control" id="exampleInputnome" aria-describedby="emailHelp" value="<?php echo $_SESSION['usuario'];?>" disabled=""></label>
                            <textarea class="form-control" id="Textarea" name="textarea" placeholder="Deixe sua mensagem aqui" required></textarea>
                            <div class="invalid-feedback">
                                Please enter a message in the textarea.
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-primary" type="submit">Adicionar</button>
                        </div>
                    </form>


                <?php endif; ?>
                </div>
                <?php while ($dado = $result->fetch_array()) {
                ?>
                    <div class="card">
                        <div class="card-header">
                            <?php echo $dado["data"]; ?>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $dado["nome"]; ?></h5>
                            <p class="card-text"><?php echo $dado["Mensagem"]; ?></p>
                        </div>
                    </div>
                <?php } ?>
        </div>
    </section>
    <footer>
        <div class="d-flex align-items-center">
            <div>
                <h3>Museu</h3>
                <p>Horario: 09:00 - 18:00</p>
            </div>
            <div>
                <h3>Links</h3>
                <a href="#">Home</a>
            </div>
            <div>
                <h3>Membros</h3>
                <a href="#">Ana</a>
            </div>
        </div>
    </footer>
</body>

</html>