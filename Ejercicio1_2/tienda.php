<?php
require_once __DIR__ . '/db_config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tienda</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <!-- /Bootstrap -->
</head>

<body>
    <header>

        <div class="navbar navbar-dark bg-dark box-shadow">
            <div class="container d-flex justify-content-between">
                <a href="#" class="navbar-brand d-flex align-items-center">
                    <strong>Tienda</strong>
                </a>
                <div>
                    <a href="showCart.php" class="btn btn-primary"><i class="bi bi-cart"></i></a>
                    <a href="showProfile.php" class="btn btn-primary">Perfil</a>
                    <a href="/logout.php" class="btn btn-danger">Cerrar sesion</a>
                </div>
            </div>
        </div>
    </header>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Productos</h1>
                <div class="row">
                     <select class="custom-select col-4 offset-4">
                         <option value="*" selected>Todos los productos</option>
                         <?php
                         $instruccion = "select distinct categoria from productos";
                         $resultado = mysqli_query($con, $instruccion);
                         while ($fila = $resultado->fetch_assoc()) {
                             echo ('<option value="' . $fila['categoria'] . '">' . $fila['categoria'] . '</option>');
                         }
                         ?>
                     </select>
                     <?php if(isset($_GET['desc'])){?>
                     <a class="btn btn-secondary offset-2 col-2" href="?">€ Ascedente</a>
                     <?php }else{?>
                        <a class="btn btn-secondary offset-2 col-2" href="?desc">€ Descendiente</a>
                    <?php }?>
                </div>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">
                    <?php
                    $order = isset($_GET['desc']) ? 'desc' : 'asc';
                    $instruccion = "select * from productos order by precio ".$order;
                    $resultado = mysqli_query($con, $instruccion);
                    while ($fila = $resultado->fetch_assoc()) {

                    ?>

                        <div class="col-md-4 producto <?php echo ($fila['categoria']); ?>">
                            <div class="card mb-4 box-shadow">
                                <div class="card-body">
                                    <h1><?php echo ($fila['nombre']); ?></h1>
                                    <span class="badge badge-info"><?php echo ($fila['categoria']); ?></span>
                                    <p class="card-text"><?php echo ($fila['descripcion']); ?></p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <div class="input-group mb-3">
                                                <form method="POST" action="addCart.php">
                                                    <input style="display: none;" name="id" type="text" value="<?php echo ($fila['id']); ?>">
                                                    <div class="input-group-append">
                                                        <input style="width: 80px;" min="1" type="number" class="form-control" name="cantidad" value="1">
                                                        <button type="submit" class="btn btn-sm btn-outline-secondary">Añadir al carrito</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                        <small class="text-muted"><?php echo ($fila['precio']); ?> €</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                </div>
            </div>
        </div>

    </main>
    <script src="alert.js"></script>
    <script>
        $( ".custom-select" ).change(function(e) {
            var sel = e.target.value;
            if(sel === '*'){
                $(".producto").show()
            }else{
                $(".producto").hide()
                $(".producto."+sel).show()
            }
        });
        
    </script>
</body>

</html>