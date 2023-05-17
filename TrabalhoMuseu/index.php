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
</head>

<body>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.7/dist/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="index.php">
            <img src="imagens/museu" width="30" height="30" class="d-inline-block align-top" alt="">
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
                <button class="btn btn-outline-success my-2 my-sm-0" id="login" data-target="#meuModal" data-toggle="modal" style="margin-right: 20px;">Login</button>

                <button class="btn btn-outline-success my-2 my-sm-0" id="cadastro" data-target="#meuModalCadastro" data-toggle="modal">Cadastro</button>
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
                                                <input type="text" name="usuario" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
                                                <small id="emailHelp" class="form-text text-muted">Nunca compartilharemos seu e-mail com mais ninguém.</small>
                                            </div>
                                        </div>

                                        <div class="field">
                                            <div class="form-group">
                                                <label for="exampleInputPassword1">Senha</label>
                                                <input type="password" name="senha" class="form-control" id="exampleInputPassword1" placeholder="Senha">
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

    <section class="corpo">
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
                                                <input type="text" name="nome" class="form-control" id="exampleInputnome" aria-describedby="emailHelp" placeholder="Enter nome">
                                            </div>
                                        </div>
                                        <div class="field">
                                            <div class="form-group">
                                                <label for="exampleInputEmail">Nome usuario</label>
                                                <input type="text" name="usuario1" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp" placeholder="Enter usuario">
                                            </div>
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
    </section>
    <?php
    if (isset($_SESSION['nao_autenticado'])) :
    ?>
        <div class="notification is-danger">
            <p>ERRO: Usuário ou senha inválidos.</p>
        </div>
        <script>
            alert("jrbf");
        </script>
    <?php
    endif;
    unset($_SESSION['nao_autenticado']);
    ?>
    <section>
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
    </section>
</body>

</html>