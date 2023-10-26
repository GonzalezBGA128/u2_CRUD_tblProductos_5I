<?php
include("./conexion.php");

//Compruebe si se ha hecho clic en el botón de registro o no
if (isset($_POST['tambah'])) {
    // recuperar datos del formulario
    $id = $_POST['id_producto'];
    $idPro = $_POST['id_provedoor'];
    $PP = $_POST['precio_paquete'];
    $des = $_POST['descripcion'];
    $PU = $_POST['precio_unidad'];
    $categoria = $_POST['categoria'];
    $numExis = $_POST['numero_existencias'];
    $NomP = $_POST['nombre_producto'];

    //consulta
    $sql = "INSERT INTO productos(id_producto,id_provedoor,precio_paquete,descripcion,precio_unidad,categoria,no_existencias,nombre_producto)
    VALUES('$id', '$idPro', '$PP', '$des', '$PU', '$categoria', '$numExis', '$NomP')";
    $query = mysqli_query($db, $sql);

    // ¿Comprueba si la consulta se guardó correctamente?
    if ($query)
        header('Location: ./index.php?status=sukses');
    else
        header('Location: ./index.php?status=gagal');
} else
    die("Acceso prohibido...");
