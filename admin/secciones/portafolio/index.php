<?php
include("../../db.php");

#---eliminar portafolio se mandar el id del portafolio a eliminar

if (isset($_GET['txtID'])) {
    $sentencia = $conexion->prepare("DELETE FROM tbl_portafolio WHERE id=:id");
    $sentencia->bindParam(":id", $_GET['txtID']);
    $sentencia->execute();
}

#Recojer los datos de la BD para luego mostrar
$sentencia = $conexion->prepare("SELECT * FROM tbl_portafolio");
$sentencia->execute();
$lista_portafolio = $sentencia->fetchAll(PDO::FETCH_ASSOC);
// print_r($lista_portafolio);


include("../../template/header.php");
?>

<div class="modal fade" id="eliminarModal" tabindex="-1" role="dialog" aria-labelledby="eliminarModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eliminarModalLabel">Confirmar eliminación</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                ¿Estás seguro de que quieres eliminar este registro? Esta acción no se puede deshacer.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                <button type="button" class="btn btn-danger" id="btnEliminar">Eliminar</button>
            </div>
        </div>
    </div>
</div>
<?php include("eliminar.php"); ?>
<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Add new Portafolio</a>
        Portafolio
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Subtitulo</th>
                        <th scope="col">Imagen</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Cliente</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Url</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_portafolio as $portafolio) { ?>
                        <tr class="">
                            <td scope="row"><?php echo $portafolio['id']; ?></td>
                            <td><?php echo $portafolio['titulo']; ?></td>
                            <td><?php echo $portafolio['subtitulo']; ?></td>
                            <td><?php echo $portafolio['imagen']; ?></td>
                            <td><?php echo $portafolio['descripcion']; ?></td>
                            <td><?php echo $portafolio['cliente']; ?></td>
                            <td><?php echo $portafolio['categoria']; ?></td>
                            <td><?php echo $portafolio['url']; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                    Launch demo modal
                                </button>
                                <a name="" id="" class="btn btn-success" href="editar.php?txtID=<?= $portafolio['id']; ?>" role="button">Editar</a>
                                <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?= $portafolio['id']; ?>" role="button">Eliminar</a>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>

    </div>
    <div class="card-footer text-muted">Footer</div>
</div>


<?php include("../../template/footer.php"); ?>