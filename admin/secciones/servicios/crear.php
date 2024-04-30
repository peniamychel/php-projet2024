<?php
include("../../db.php");
$icon = (isset($_POST['icono'])) ? $_POST['icono'] : "";
$titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
$description = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";
$validar = $icon =="" && $titulo =="" && $description ="";
if ($_POST && $validar) {
    // print_r($_POST);

    //conectar a la base de datos
    // $sentencia = $conexion->prepare("INSERT INTO tbl_servicios (icono, titulo, descripcion) VALUES (?, ?, ?)");
    // $resultado = $sentencia->execute([$icon, $titulo, $description]);
    // if($resultado){
    //     header('Location: index.php');
    // }

    #conectar insertar otro modo
    $sentencia = $conexion->prepare("INSERT INTO tbl_servicios (id, icono, titulo, descripcion) VALUES (NULL, :icono, :titulo, :descripcion)");
    $sentencia->bindParam(":icono", $icon);
    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $description);
    $sentencia->execute();
    if($sentencia){
        header('Location: index.php');
    }
}



include("../../template/header.php");
?>
<div class="container">
    <div class="d-flex justify-content-center">
        <div class="col-6">
            <div class="card ">
                <div class="card-header">Crear Servicios</div>
                <div class="card-body">
                    <form action=""
                          enctype="multipart/form-data"
                          method="post">
                        <div class="mb-3">
                            <label for="icono"
                                   class="form-label">
                                Icono
                            </label>
                            <input type="text"
                                   class="form-control"
                                   name="icono"
                                   id="icono"
                                   aria-describedby="helpId"
                                   placeholder="Icono" />
                        </div>
                        <div class="mb-3">
                            <label for="titulo"
                                   class="form-label">
                                Titulo
                            </label>
                            <input type="text"
                                   class="form-control"
                                   name="titulo"
                                   id="titulo"
                                   aria-describedby="helpId"
                                   placeholder="Titulo" />
                        </div>
                        <div class="mb-3">
                            <label for="descripcion"
                                   class="form-label">
                                Descripcion
                            </label>
                            <input type="text"
                                   class="form-control"
                                   name="descripcion"
                                   id="descripcion"
                                   aria-describedby="helpId"
                                   placeholder="Descripcion" />
                        </div>
                        <button type="submit"
                                class="btn btn-success">
                            Agregar
                        </button>
                        <a name=""
                           id=""
                           class="btn btn-primary"
                           href="index.php"
                           role="button">
                            Cancelar
                        </a>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include("../../template/footer.php"); ?>