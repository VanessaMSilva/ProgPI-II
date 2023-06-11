<?php
session_start();
include("cabecalho.php");
$consulta = "SELECT id, titulo, texto, imagem, autor FROM items;";
$result = mysqli_query($conexao, $consulta);
?>
    <section>
        <?php while ($dado = $result->fetch_array()) {
        ?>
            <div class="container">
                <div class="d-lg-flex align-items-center">
                <div>
                        <h1><?php echo $dado["titulo"]; ?></h1>
                        <h2><?php echo $dado["autor"];?></h2>
                        <p><?php echo $dado["texto"]; ?></p>
                    </div>
                    <div><img class="imagem" src="exibir_imagem.php?id=<?php echo $dado["id"]?>" alt="Imagem"></div>
                </div>
            </div>
        <?php } ?>
        </div>
    </section>
    <footer>
        <div class="d-flex justify-content-around">
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