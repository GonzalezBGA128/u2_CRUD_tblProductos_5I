<?php include("./conexion.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Belajar Dasar CRUD dengan PHP dan MySQL">
    <title>Belleza Organica</title>

    <!-- bootstrap cdn -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!-- material icon -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />

    <link rel="stylesheet" href="./css/style.css">
</head>

<body class="bg-light">
    <!-- navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white border-bottom" style="position: sticky !important;
    top: 0 !important; z-index : 99999 !important;">
        <div class="container-fluid container">
            <a class="navbar-brand" href="#">Belleza Organica</a>
            <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                        <a class="nav-link active text-sm-start text-center" aria-current="page" href="#">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn btn-primary ms-md-4 text-white" href="#">Inicio Sesion</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>


    <div class="container mt-5">
        <!-- form agregar bellezaorganica -->
        <div class="card mb-5">
            <!-- <div class="card-header">
               Práctica CRUD de PHP y MySQL
            </div> -->
            <!-- agregar datos -->
            <div class="card-body">
                <h3 class="card-title">Grecia Arely Gonzalez Barraza 5-I</h3>
                <p class="card-text">Tabla Productos</p>

                <!-- mostrar mensaje de éxito agregado -->
                <?php if (isset($_GET['status'])) : ?>
                    <?php
                    if ($_GET['status'] == 'sukses')
                        echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Datos agregados exitosamente!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    else
                        echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups algo salio mal!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
                    ?>
                <?php endif; ?>


                <form class="row g-3" action="agregar.php" method="POST">

                    <div class="col-md-4">
                        <label for="id_producto" class="form-label">Id Producto</label>
                        <input type="number" name="id_producto" class="form-control" placeholder="id producto" required>
                    </div>
                    <div class="col-md-4">
                        <label for="id_provedoor" class="form-label">Id Provedoor</label>
                        <input type="number" name="id_provedoor" class="form-control" placeholder="id provedoor" required>
                    </div>

                    <div class="col-md-4">
                        <label for="precio_paquete" class="form-label">Precio Paquete</label>
                        <input type="text" name="precio_paquete" class="form-control" placeholder="precio paquete" required>
                    </div>

                    <div class="col-md-4">
                        <label for="descripcion" class="form-label">Descripcion</label>
                        <input type="text" name="descripcion" class="form-control" placeholder="descripcion" required>
                    </div>

                    <div class="col-md-4">
                        <label for="precio_unidad" class="form-label">Precio Unidad</label>
                        <input type="text" name="precio_unidad" class="form-control" placeholder="precio unidad" required>
                    </div>

                    <div class="col-md-4">
                        <label for="categoria" class="form-label">Categoria</label>
                        <input type="text" name="categoria" class="form-control" placeholder="categoria" required>
                    </div>

                    <div class="col-md-4">
                        <label for="numero_existencias" class="form-label">Numero Existencias</label>
                        <input type="number" name="numero_existencias" class="form-control" placeholder="numero existencias" required>
                    </div>

                    <div class="col-md-4">
                        <label for="nombre_producto" class="form-label">Nombre Producto</label>
                        <input type="text" name="nombre_producto" class="form-control" placeholder="nombre producto" required>
                    </div>

                    <div class="col-12">
                        <button type="submit" class="btn btn-primary" value="daftar" name="tambah"><i class="fa fa-plus"></i><span class="ms-2">Agregar datos</span></button>
                    </div>
                </form>
            </div>
        </div>


        <!-- título de la tabla -->
        <h5 class="mb-3">LISTA DE PRODUCTOS</h5>

        <div class="row my-3">
            <div class="col-md-2 mb-3">
                <select class="form-select" aria-label="Default select example">
                    <option selected>Mostrar entradas</option>
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                </select>
            </div>
            <div class="col-md-3 ms-auto">
                <div class="input-group mb-3 ms-auto">
                    <input type="text" class="form-control" placeholder="Buscar algo..." aria-label="cari" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="button" id="button-addon2"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </div>


        <!--mostrar mensaje de eliminación exitosa -->
        <?php if (isset($_GET['eliminar'])) : ?>
            <?php
            if ($_GET['eliminar'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Datos eliminados exitosamente!</strong>!
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups algo salio mal!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- mostrar un mensaje de edición exitosa -->
        <?php if (isset($_GET['update'])) : ?>
            <?php
            if ($_GET['update'] == 'sukses')
                echo "<div class='alert alert-success alert-dismissible fade show' role='alert'>
                        <strong>Datos actualizados exitosamente!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            else
                echo "<div class='alert alert-danger alert-dismissible fade show' role='alert'>
                        <strong>Ups algo salio mal!</strong>
                        <button type='button' class='btn-close' onclick='clicking()' data-bs-dismiss='alert' aria-label='Close'></button>
                      </div>";
            ?>
        <?php endif; ?>

        <!-- tabla -->
        <div class="table-responsive mb-5 card">
            <?php
            echo "<div class='card-body'>";

            echo "<table class='table table-hover align-middle bg-white'>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col' class='text-center'>No</th>";
            echo "<th scope='col'>Id Producto</th>";
            echo "<th scope='col'>Id Provedoor</th>";
            echo "<th scope='col'>Precio Paquete</th>";
            echo "<th scope='col'>Descripcion</th>";
            echo "<th scope='col'>Precio Unidad</th>";
            echo "<th scope='col'>Categoria</th>";
            echo "<th scope='col'>Numero Existencias</th>";
            echo "<th scope='col'>Nombre Producto</th>";
            echo "<th scope='col' class='text-center'>Opciones</th>";
            echo "</tr>";
            echo "</thead>";
            echo "<tbody>";



            $batas = 10;
            $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
            $pagina_awal = ($pagina > 1) ? ($pagina * $batas) - $batas : 0;

            $previous = $pagina - 1;
            $next = $pagina + 1;

            $data = mysqli_query($db, "SELECT * FROM productos");
            $jumlah_data = mysqli_num_rows($data);
            $total_pagina = ceil($jumlah_data / $batas);

            $data_mhs = mysqli_query($db, "SELECT * FROM productos LIMIT $pagina_awal, $batas");
            $no = $pagina_awal + 1;

            // $sql = "SELECT * FROM bellezaorgsanica";
            // $query = mysqli_query($db, $sql);




            while ($bellezaorganica = mysqli_fetch_array($data_mhs)) {
                echo "<tr>";
                echo "<td style='display:none'>" . $bellezaorganica['id'] . "</td>";
                echo "<td class='text-center'>" . $no++ . "</td>";
                echo "<td>" . $bellezaorganica['id_producto'] . "</td>";
                echo "<td>" . $bellezaorganica['id_provedoor'] . "</td>";
                echo "<td>" . $bellezaorganica['precio_paquete'] . "</td>";
                echo "<td>" . $bellezaorganica['descripcion'] . "</td>";
                echo "<td>" . $bellezaorganica['precio_unidad'] . "</td>";
                echo "<td>" . $bellezaorganica['categoria'] . "</td>";
                echo "<td>" . $bellezaorganica['no_existencias'] . "</td>";
                echo "<td>" . $bellezaorganica['nombre_producto'] . "</td>";

                echo "<td class='text-center'>";

                echo "<button type='button' class='btn btn-primary editButton pad m-1'><span class='material-icons align-middle'>edit</span></button>";

                //boton borrar
                echo "
                            <!-- Button trigger modal -->
                            <button type='button' class='btn btn-danger deleteButton pad m-1'><span class='material-icons align-middle'>delete</span></button>";
                echo "</td>";

                echo "</tr>";
            }

            echo "</tbody>";
            echo "</table>";
            if ($jumlah_data == 0) {
                echo "<p class='text-center'>No hay datos disponibles en esta tabla.</p>";
            } else {
                echo "<p>Total $jumlah_data de datos</p>";
            }

            echo "</div>";
            ?>
        </div>

        <!-- pagina -->
        <nav class="mt-5 mb-5">
            <ul class="pagination justify-content-center">
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina > 1) ? "href='?pagina=$previous'" : "" ?>><i class="fa fa-chevron-left"></i></a>
                </li>
                <?php
                for ($x = 1; $x <= $total_pagina; $x++) {
                ?>
                    <li class="page-item"><a class="page-link" href="?pagina=<?php echo $x ?>"><?php echo $x; ?></a></li>
                <?php
                }
                ?>
                <li class="page-item">
                    <a class="page-link" <?php echo ($pagina < $total_pagina) ? "href='?pagina=$next'" : "" ?>><i class="fa fa-chevron-right"></i></a>
                </li>
            </ul>
        </nav>

        <!-- Capital Editar-->
        <div class='modal fade' style="top:58px !important;" id='editModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog' style="margin-bottom:100px !important;">
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Editar datos del producto</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>

                    <?php
                    $sql = "SELECT * FROM productos";
                    $query = mysqli_query($db, $sql);
                    $bellezaorganica = mysqli_fetch_array($query);
                    ?>

                    <form action='edit.php' method='POST'>
                        <div class='modal-body text-start'>
                            <input type='hidden' name='edit_id' id='edit_id'>

                            <div class="col-12 mb-3">
                                <label for="edit_id_producto" class="form-label">Id Producto</label>
                                <input type="number" name="edit_id_producto" id="edit_id_producto" class="form-control" placeholder="1,2,3..." required>
                            </div>
                            <div class="col-12 mb-3">
                                <label for="edit_id_provedoor" class="form-label">Id Provedoor</label>
                                <input type="number" name="edit_id_provedoor" id="edit_id_provedoor" class="form-control" placeholder="1,2,3..." required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_id_precio_paquete" class="form-label">Precio Paquete</label>
                                <input type="text" name="edit_id_precio_paquete" id="edit_id_precio_paquete" class=" form-control" placeholder="1,2,3..." required>
                            </div>


                            <div class="col-12 mb-3">
                                <label for="edit_id_descripcion" class="form-label">Descripcion</label>
                                <input type="text" name="edit_id_descripcion" id="edit_id_descripcion" class=" form-control" placeholder="1,2,3..." required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_id_precio_unidad" class="form-label">Precio Unidad</label>
                                <input type="text" name="edit_id_precio_unidad" class="form-control" id="edit_id_precio_unidad" placeholder="1,2,3..." required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_categoria" class="form-label">Categoria</label>
                                <input type="text" name="edit_categoria" id="edit_categoria" class=" form-control" placeholder="apple" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_num" class="form-label">Numero Existencias</label>
                                <input type="number" name="edit_num" id="edit_num" class=" form-control" placeholder="5000" required>
                            </div>

                            <div class="col-12 mb-3">
                                <label for="edit_nombre" class="form-label">Nombre Producto</label>
                                <input type="text" name="edit_nombre" id="edit_nombre" class=" form-control" placeholder="24/10/2023" required>
                            </div>

                        </div>
                        <div class='modal-footer'>
                            <button type='submit' name='edit_data' class='btn btn-primary'>Actualizar datos</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- capital eliminar-->
        <div class='modal fade' style="top:58px !important;" id='deleteModal' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
            <div class='modal-dialog'>
                <div class='modal-content'>
                    <div class='modal-header'>
                        <h5 class='modal-title' id='exampleModalLabel'>Confirmación</h5>
                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                    </div>


                    <form action='eliminar.php' method='POST'>

                        <div class='modal-body text-start'>
                            <input type='hidden' name='delete_id' id='delete_id'>
                            <p>¿Estás seguro de que deseas eliminar estos datos?</p>
                        </div>

                        <div class='modal-footer'>
                            <button type='submit' name='deletedata' class='btn btn-primary'>Eliminar</button>
                        </div>

                    </form>


                </div>
            </div>
        </div>


        <!-- cerrar el contenedor -->
    </div>


    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Javascript bule with popper bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>

    <!-- sweet alert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

    <!-- editar function -->
    <script>
        $(document).ready(function() {
            $('.editButton').on('click', function() {
                $('#editModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#edit_id').val(data[0]);
                // no lo uso, porque es sólo un número incremental
                // $('#no').val(datos[1]);
                $('#edit_id_prov').val(data[2]);
                $('#edit_id_paqYrec').val(data[3]);
                $('#edit_id_chip').val(data[4]);
                $('#edit_id_tel').val(data[5]);
                $('#edit_id_accesorios').val(data[6]);
                $('#edit_nombre_prov').val(data[7]);
                $('#edit_inversion_prov').val(data[8]);
                $('#edit_fecha').val(data[9]);


            });
        });
    </script>

    <!-- eliminar function -->
    <script>
        $(document).ready(function() {
            $('.deleteButton').on('click', function() {
                $('#deleteModal').modal('show');

                $tr = $(this).closest('tr');

                var data = $tr.children("td").map(function() {
                    return $(this).text();
                }).get();

                console.log(data);
                $('#delete_id').val(data[0]);
            });
        });
    </script>

    <script>
        function clicking() {
            window.location.href = './index.php';
        }
    </script>
</body>

</html>