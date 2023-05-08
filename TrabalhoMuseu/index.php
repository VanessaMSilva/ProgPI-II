<?php
session_start();
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
    <header class="inicio">
        <div class="Container Flex">
            <div id="logo"><a href="index.html">Museu</a>
            </div>
            <nav>
                <input type="checkbox" id="check">
                <label id="label" for="check">&#x268c;</label>
                <ul class="menu">
                    <li><a href="login.php" data-target="#meuModal" data-toggle="modal">Login</a></li>
                    <li><a href="atividades.html">Cadastro</a></li>
                    <li><a href="contatos.html">Inicio</a></li>
                    <li><a href="localizacao.html">Atividades</a></li>

                </ul>
            </nav>
        </div>
    </header>
    <section class="hero is-success is-fullheight">
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
                                    <div class="notification is-danger">
                                        <p>ERRO: Usuário ou senha inválidos.</p>
                                    </div>
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
        <div><button data-target="#meuModal" data-toggle="modal">Ver login</button>
            <button class="btn btn-primary" data-toggle="modal" data-target="#modal-mensagem">
                Exibir mensagem
            </button>
        </div>

    </section>
</body>

</html>