<?php
session_start();
require_once __DIR__ . '/db_config.php';
$total = 0;
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
                <a href="/tienda.php" class="navbar-brand d-flex align-items-center">
                    <strong>Tienda</strong>
                </a>
                <div>
                    <a href="showProfile.php" class="btn btn-primary">Perfil</a>
                    <a href="/logout.php" class="btn btn-danger">Cerrar sesion</a>
                </div>
            </div>
        </div>
    </header>

    <main role="main">

        <section class="jumbotron text-center">
            <div class="container">
                <h1 class="jumbotron-heading">Carrito</h1>
            </div>
        </section>

        <div class="album py-5 bg-light">
            <div class="container">
            <?php
             $instruccion = "select * from compras left join usuarios on 'compras.usuario_id' = usuarios.id left join productos on productos.id = producto_id where fecha is null and usuario_id =" . $_SESSION['id'];
             $resultado = mysqli_query($con, $instruccion);
                if($resultado->num_rows > 0){
            ?>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th>Categoria</th>
                            <th>Unidades</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                       
                        while ($fila = $resultado->fetch_assoc()) {

                        ?>
                            <tr>
                                <th scope="row"><?php echo ($fila['nombre']); ?></th>
                                <td><?php echo ($fila['categoria']); ?></td>
                                <td><?php echo ($fila['cantidad']); ?></td>
                                <td><?php echo ($fila['precio']); ?></td>
                                <td><?php echo ($fila['total']); $total += doubleval($fila['total']); ?> €</td>
                                <td>
                                <button onclick="edit('<?php echo ($fila['producto_id']); ?>',<?php echo ($fila['cantidad']); ?>)" class="btn btn-info"><i class="bi bi-pencil-fill"></i></button>
                                <a href="deleteCart.php?id=<?php echo ($fila['producto_id']); ?>" class="btn btn-danger"><i class="bi bi-trash-fill"></i></a></td>
                            </tr>

                        <?php
                        }
                        ?>
                    </tbody>
                </table>
                <h3>Total: <?php print $total?> €</h3>
                <a href="tienda.php" class="btn btn-primary">Seguir comprando</a>
                <a href="buyCart.php" class="btn btn-success">Comprar</a>
                <?php 
                }else{
                    ?>
                    <h3>No hay productos en el carrito</h3>
                    <a href="tienda.php" class="btn btn-primary">Vover a la tienda</a>
                    <?php 
                }
                ?>
            </div>
        </div>

    </main>
    <script src="alert.js"></script>
    <script>
    function isNumeric(num){
        return !isNaN(num)
    }
    function edit(id,cantidad){
        var num = prompt("¿Quiere cambia las unidades del producto?",cantidad);
        if(isNumeric(num) && parseInt(num) > 0){
                window.location = '/updateCart.php?id='+id+'&cantidad='+num;
        }else{
            alert('Operacion no completada: Debe introducir un número entero positivo')
        }
        
        
    }
    </script>

</body>

</html>