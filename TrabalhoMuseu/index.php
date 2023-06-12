<?php
session_start();
include('cabecalho.php');

$consulta = "SELECT id,Mensagem, data,nome FROM mensagens;";
$result = mysqli_query($conexao, $consulta);

$consultaMuseu = "SELECT id, titulo, texto, imagem, autor FROM items;";
$result2 = mysqli_query($conexao, $consultaMuseu);
?>


<section id="quadros">
    <div class="container">
        <div class="d-lg-flex align-items-center" id="grito">
            <div><img class="imagem" src="imagens/Grito.jpg" alt="Imagem"></div>
            <div>
                <h1>Quadro grito</h1>
                <h2>criado por Van Gogh</h2>
                <p>O quadro "O Grito" é uma icônica obra de arte do pintor norueguês Edvard Munch, criada em 1893. É considerada uma das pinturas mais famosas e influentes do movimento expressionista.

                    A pintura retrata uma figura solitária em um cenário desolado e surreal. No centro do quadro, há uma figura andrógina com uma expressão de profundo desespero. Seu rosto é contorcido em uma máscara de angústia, com a boca aberta em um grito silencioso. As mãos da figura estão posicionadas nos ouvidos, como se tentasse bloquear algum som aterrorizante.

                    O ambiente ao redor da figura é sombrio e tumultuado. O céu e a água têm tonalidades vibrantes e perturbadoras de laranja e amarelo, criando um contraste intenso com a figura principal. As formas ao redor da figura parecem distorcidas e onduladas, evocando uma sensação de ansiedade e instabilidade.

                    "O Grito" é uma representação poderosa da angústia e da alienação humana. Munch criou a pintura como uma expressão pessoal de suas próprias lutas emocionais e existenciais. A obra captura a sensação de desespero e impotência que muitos indivíduos experimentam em algum momento de suas vidas, tornando-se um símbolo universal de angústia e inquietude.

                    Existem várias versões de "O Grito", incluindo pinturas a óleo, pastéis e litografias. A obra tem sido objeto de inúmeras interpretações e análises ao longo dos anos, e sua imagem se tornou um ícone cultural, reconhecido em todo o mundo.</p>
            </div>
        </div>
    </div>

    <div class="container" id="noiteestrelada">
        <div class="d-lg-flex align-items-center">
            <div>
                <h1>Quadro noite estrelada</h1>
                <h2>criado por Van Gogh</h2>
                <p>Uma das pinturas mais famosas que retrata uma noite estrelada é "A Noite Estrelada" (em inglês, "The Starry Night"), do pintor pós-impressionista Vincent van Gogh. Nessa obra, van Gogh retrata um céu noturno com um turbilhão de estrelas, combinando tons de azul, amarelo e branco para criar uma atmosfera vibrante e emocional.</p>
            </div>
            <div><img class="imagem" src="imagens/van-gogh-noite-estrelada.jpg" alt="Imagem"></div>
        </div>
    </div>


    <?php while ($dado = $result2->fetch_array()) {
    ?>
        <div class="container">
        <?php if($gerente){?>
            <div class="delete">
                <form action="ImagemDeletar.php" method="POST">
                    <input type="hidden" name="item_id" value="<?php echo  $dado['id'];?>">
                    <button type="submit" class="buttonImg" >Deletar</button>
                </form>
            </div>
           
        <?php }?>

            <div class="d-lg-flex align-items-center">
                <div>
                    <h1><?php echo $dado["titulo"]; ?></h1>
                    <h2><?php echo $dado["autor"]; ?></h2>
                    <p><?php echo $dado["texto"]; ?></p>
                </div>

                <div><img class="imagem" src="exibir_imagem.php?id=<?php echo $dado["id"] ?>" alt="Imagem"></div>
            </div>
        </div>
        
    <?php } ?>

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
                            <input type="text" name="nome1" class="form-control f" id="exampleInputnome" aria-describedby="emailHelp" value="<?php echo $_SESSION['usuario']; ?>" disabled=""></label>
                        <textarea class="form-control f" id="Textarea" name="textarea" placeholder="Deixe sua mensagem aqui" required></textarea>
                        <div class="invalid-feedback">
                            Please enter a message in the textarea.
                        </div>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit">Adicionar</button>
                    </div>
                </form>
            </div>
        <?php endif; ?>
        <?php while ($dado = $result->fetch_array()) {
        ?>
            <div class="card">
                <div class="card-body">
                    <div class="float-right"><?php
                                                $dateString = $dado["data"];
                                                $timezone = new DateTimeZone('America/Sao_Paulo');
                                                $datetime = new DateTime($dateString, $timezone);
                                                $dateString = $datetime->format('d/m/Y H:i:s');
                                                echo " ", $dateString; ?></div>
                    <div>
                        <h5 class="card-title"><?php echo $dado["nome"]; ?></h5>
                    </div>

                    <p class="card-text"><?php echo $dado["Mensagem"]; ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<?php
    include("rodape.php");
?>