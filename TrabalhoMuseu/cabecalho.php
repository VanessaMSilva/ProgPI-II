<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema de Login - PHP + MySQL - Museu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <script src="./verificar.js"></script>
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
                    <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#quadros">Obras</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Membros
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="membros.php">Ver membros</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Funcionarios</a>
                    </div>
                </li>
                <li class="nav-item">
                    <?php
                    $gerente = include("gerente.php");
                    if ($gerente) {
                        echo '<a class="nav-link" href="#"  id="inserir" data-target="#ModalInserir" data-toggle="modal">Inserir</a>';
                    } else {
                        echo '<a class="nav-link  disabled " href="#">Desabilitado</a>';
                    }
                    ?>
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
                                                <label for="exampleInputEmail">Nome usuario</label>
                                                <input type="text" name="usuario" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter usuario" pattern="[A-Za-z1-9]+" required>
                                                <small id="emailHelp" class="form-text text-muted">Nunca compartilharemos seu e-mail com mais ninguém.</small>
                                            </div>
                                        </div>

                                        <div class="field">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Senha</label>
                                                <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Senha" required>
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
                                        alert("ERRO: Usuario já cadastrado.");
                                    </script>
                                <?php
                                endif;
                                unset($_SESSION['usuario_existe']);
                                ?>
                                <div class="box">
                                    <form name="formcadastro" action="cadastrar.php" method="POST">
                                        <div class="field">
                                            <div class="form-group">
                                                <label for="exampleInputnome1">Nome</label>
                                                <input type="text" name="nome" class="form-control" id="exampleInputnome1" aria-describedby="Nome" placeholder="Enter nome" pattern="[A-Za-z]+" required>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="form-group">
                                                <label for="exampleInputsobrenome">Sobrenome</label>
                                                <input type="text" name="sobrenome" class="form-control" id="exampleInputsobrenome" aria-describedby="Sobrenome" placeholder="Enter sobrenome" pattern="[A-Za-z]+" required>
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="form-group">
                                                <label for="exampleInputEmail1">Nome usuario</label>
                                                <input type="text" name="usuario1" class="form-control" id="exampleInputEmail1" aria-describedby="NomeUsuario" placeholder="Enter usuario" pattern="[A-Za-z0-9]+" required>
                                            </div>
                                        </div>

                                        <div class="field">
                                            <div class="field">
                                                <div class="form-group">
                                                    <label for="exampleInputPassword">Senha</label>
                                                    <input type="password" name="senha1" class="form-control" id="exampleInputPassword" placeholder="Senha" required>
                                                    <span id="span"></span>
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




    <!--'<a class="nav-link" href="#" id=inserir data-target="#ModalInserir" data-toggle="modalInserir">Inserir</a>';-->

    <section>
        <div class="modal fade" id=ModalInserir>
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-header">
                        <h5 class="modal-title">Inserir imagem e texto</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>×</span></button>
                    </div>
                    <div class="modal-body">
                        <div class="container has-text-centered">
                            <div class="column is-4 is-offset-4">
                                <div class="box">
                                    <form method="POST" action="enviar.php" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="imagem">Imagem</label>
                                            <input type="file" class="form-control-file" name="imagem" id="imagem1" accept=".png, .jpeg" required>
                                        </div>
                                        <div>
                                            <label for="titulo">Titulo</label>
                                            <input class="form-control" type="text" name="titulo" id="titulo1" required>
                                        </div>
                                        <div>
                                            <label for="autor">Autor</label>
                                            <input class="form-control" type="text" name="autor" id="autor" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="texto">Texto</label>
                                            <textarea class="form-control" name="texto" id="texto1" required></textarea>
                                        </div>

                                        <button type="submit" class="btn btn-primary" name="submit">Salvar</button>
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
