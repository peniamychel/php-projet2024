<?php
include("../../db.php");

$icono_post = (isset($_POST['icono'])) ? $_POST['icono'] : "";
$titulo_post = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
$descripcion_post = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";
$txtID_get = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

#MODIFICAR REGISTRO
#recojermos el id
if (isset($txtID_get)) {
    //echo $_GET['txtID'];
    // $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("SELECT * FROM tbl_servicios WHERE id=:id");
    $sentencia->bindParam(":id", $txtID_get);
    $sentencia->execute();
    $lista_servicios = $sentencia->fetch(PDO::FETCH_LAZY);
    // print_r($lista_servicios);
    $icono = $lista_servicios['icono'];
    $titulo = $lista_servicios['titulo'];
    $descripcion = $lista_servicios['descripcion'];
}

#ACTUALIZAR LOS NUEVOS DATOS 
if ($_POST) {

    //editar de otro modo
    // $sentencia = $conexion->prepare("UPDATE tbl_servicios SET icono=?, titulo=?, descripcion=? WHERE id = ?");
    // $resultado = $sentencia->execute([$icono_post, $titulo_post, $descripcion_post, $txtID_get]);
    // if ($resultado) {
    //     header('Location: index.php');
    // }

    //print_r($_POST);

    #conectar insertar de otro modo
    $sentencia = $conexion->prepare("UPDATE tbl_servicios SET icono=:icono, titulo=:titulo, descripcion=:descripcion WHERE id=:id");
    $sentencia->bindParam(":id", $txtID_get);
    $sentencia->bindParam(":icono", $icono_post);
    $sentencia->bindParam(":titulo", $titulo_post);
    $sentencia->bindParam(":descripcion", $descripcion_post);
    $sentencia->execute();
    if ($sentencia) {
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
                                <i class="fa fa-id-card-o"
                                   aria-hidden="true"></i>
                            </label>
                            <input value="<?php echo $icono; ?>"
                                   type="text"
                                   class="form-control"
                                   name="icono"
                                   id="icono"
                                   aria-describedby="helpId"
                                   placeholder="Icono" />
                        </div>

                        <div class="mb-3">
                            <label for="titulo"
                                   class="form-label">Titulo</label>
                            <input value="<?php echo $titulo; ?>"
                                   type="text"
                                   class="form-control"
                                   name="titulo"
                                   id="titulo"
                                   aria-describedby="helpId"
                                   placeholder="Titulo" />
                        </div>
                        <div class="mb-3">
                            <label for="descripcion"
                                   class="form-label">Descripcion</label>
                            <input value="<?php echo $descripcion; ?>"
                                   type="text"
                                   class="form-control"
                                   name="descripcion"
                                   id="descripcion"
                                   aria-describedby="helpId"
                                   placeholder="Descripcion" />
                        </div>
                        <button type="submit"
                                class="btn btn-success">
                            Actualizar
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