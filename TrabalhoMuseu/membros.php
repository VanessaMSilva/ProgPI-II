<?php
session_start();
include("cabecalho.php");
$consulta = "SELECT * FROM usuario;";
$result = mysqli_query($conexao, $consulta);
?>
<section>
    <div class="container">
        <div class="tabela">
            <table>
                <tr>
                    <th>Nome</th>
                    <th>Usuario</th>
                    <th>Gerente</th>
                    <?php if($gerente){?>
                    <th>Mudar gerencia</th>
                    <?php }?>
                </tr>
                <?php 
                
                while ($dado = $result->fetch_array()) {
                ?>

                    <tr>
                        <td><?php echo $dado["nome"]; ?></td>
                        <td><?php echo $dado["usuario"]; ?></td>
                        <td><?php if ($dado["usuario_gerente"]) echo "Sim";
                            else echo "Não"; ?></td>
                        <?php if($gerente && $_SESSION['usuario'] !=  $dado["usuario"]){?>
                        <td>
                            <form action="membrosEditar.php" method="POST">
                            <input type="hidden" name="item_id" value="<?php echo  $dado['usuario']; ?>"> 
                            <input type="hidden" name="item_id2" value="<?php echo  $dado['usuario_gerente']; ?>"> 
                            <button class="btn btn-primary"> Editar</button>
                        </form>
                            
                        </td>
                        <td><form action="membrosdelete.php" method="POST">
                            <input type="hidden" name="item_id" value="<?php echo  $dado['usuario']; ?>"> 
                            <input type="hidden" name="item_id2" value="<?php echo  $dado['usuario_gerente']; ?>"> 
                            <button class="btn btn-danger" >Delete</button>
                        </form></td><?php }?>
                    </tr>

                <?php } ?>
            </table>
        </div>
    </div>
</section>
<?php include("rodape.php");?>