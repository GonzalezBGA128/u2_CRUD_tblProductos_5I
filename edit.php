<?php
include("./conexion.php");

// Compruebe si se ha hecho clic en el botón de registro o no
if (isset($_POST['edit_data'])) {
    // recuperar datos del formulario
    $id = $_POST['edit_id'];
    $idProd= $_POST['edit_id_producto'];
    $idProved = $_POST['edit_id_provedoor'];
    $pp = $_POST['edit_id_precio_paquete'];
    $dess = $_POST['edit_id_descripcion'];
    $pu = $_POST['edit_id_precio_unidad'];
    $categori = $_POST['edit_categoria'];
    $numex = $_POST['edit_num'];
    $nom = $_POST['edit_nombre'];

    // consulta
    $sql = "UPDATE productos SET id_producto='$idProd', id_provedoor='$idProved', precio_paquete='$pp', descripcion='$dess', precio_unidad='$pu', categoria='$categori', no_existencias='$numex', nombre_producto ='$nom' WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    //¿Comprueba si la consulta se guardó correctamente?
    if ($query)
        header('Location: ./index.php?update=sukses');
    else
        header('Location: ./index.php?update=gagal');
} else
    die("Acceso prohibido...");
