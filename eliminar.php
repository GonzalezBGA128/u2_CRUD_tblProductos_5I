<?php
include("./conexion.php");

if (isset($_POST['deletedata'])) {
    // tomar la identificación de la cadena de consulta
    $id = $_POST['delete_id'];

    //eliminar consulta
    $sql = "DELETE FROM productos WHERE id = '$id'";
    $query = mysqli_query($db, $sql);

    //¿Se eliminó correctamente la consulta?
    if ($query) {
        header('Location: ./index.php?eliminar=sukses');
    } else
        die('Location: ./index.php?eliminar=gagal');
} else
    die("el acceso está prohibido...");
