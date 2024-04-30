<?php
include("../../db.php");

#---eliminar registro, se eliminara dicho registro con el id correspondiente
//seleccionamos los registros
if (isset($_GET['txtID'])) {
    //echo $_GET['txtID'];
    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("DELETE FROM tbl_servicios WHERE id=:id");
    $sentencia->bindParam(":id", $_GET['txtID']);
    $sentencia->execute();
}

#Recojer los datos para luego poder mostrar
$sentencia = $conexion->prepare("SELECT * FROM tbl_servicios");
$sentencia->execute();
$lista_servicios = $sentencia->fetchAll(PDO::FETCH_ASSOC);
//print_r($lista_servicios);

include("../../template/header.php");
?>
<div class="card">
    <div class="card-header">
        <a name=""
           id=""
           class="btn btn-primary"
           href="crear.php"
           role="button">Agregar Registro</a>

        Lista de Servicion
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Id 1</th>
                        <th scope="col">Icono 2</th>
                        <th scope="col">Titulo 3</th>
                        <th scope="col">Descripcion 3</th>
                        <th scope="col">Acciones 3</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($lista_servicios as $servicio) { ?>
                    <tr class="">
                        <td scope="row"><?= $servicio['id'] ?></td>
                        <td><?= $servicio['icono']; ?></td>
                        <td><?= $servicio['titulo']; ?></td>
                        <td><?= $servicio['descripcion']; ?></td>
                        <td>
                            <a name=""
                               id=""
                               class="btn btn-info"
                               href="editar.php?txtID=<?= $servicio['id']; ?>"
                               role="button">Editar</a>
                            |
                            <a name=""
                               id=""
                               class="btn btn-primary"
                               href="index.php?txtID=<?= $servicio['id']; ?>"
                               role="button">Eliminar</a>

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