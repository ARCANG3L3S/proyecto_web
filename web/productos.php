<?php
session_start();

$products = array(
    array("id" => 1, "name" => "Lápiz", "price" => 8.5, "image" => "imagenes\\lápiz.jpg", "description" => "Marca Paper Mate, 15cm, color azul"),
    array("id" => 2, "name" => "Bolígrafo", "price" => 15.5, "image" => "imagenes\\bolígrafo.jpg", "description" => "Marca AbaCCO, color negro"),
    array("id" => 3, "name" => "Cuaderno", "price" => 42, "image" => "imagenes\\cuaderno.jpg", "description" => "Marca Barrilito, 100 hojas, cuadriculado"),
    array("id" => 4, "name" => "Goma de borrar", "price" => 5, "image" => "imagenes\\goma_de_borrar.jpg", "description" => "Marca Pelikan, color blanco"),
    array("id" => 5, "name" => "Regla", "price" => 12, "image" => "imagenes\\regla.jpg", "description" => "Marca Baco, 30cm, color transparente"),
);


if (!isset($_SESSION['carrito'])) {
    $_SESSION['carrito'] = array();
}


if (isset($_POST['agregar_al_carrito'])) {
    $producto_id = $_POST['producto_id'];
    if (isset($_SESSION['carrito'][$producto_id])) {
        $_SESSION['carrito'][$producto_id]++;
    } else {
        $_SESSION['carrito'][$producto_id] = 1;
    }
}

function calcularTotalPagar($productos, $carrito) {
    $total = 0;

    foreach ($carrito as $producto_id => $cantidad) {
        $precio = $productos[$producto_id - 1]['price']; 
        $total += $precio * $cantidad;
    }

    return $total;
}
if (isset($_POST['comprar_ahora'])) {
    // Procesa la compra aquí
    $mensajeCompra = "Compra exitosa";

    // Vacía el carrito
    $_SESSION['carrito'] = array();
}

?>

<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: #f5f5f5;
        }
        .product {
            border: 1px solid #ddd;
            margin: 10px;
            padding: 10px;
            width: 45%;
            height: 300px;
            box-sizing: border-box;
            text-align: center;
            transition: all 0.5s ease;
            display: flex;
            align-items: center;
            background-color: #fff;
        }
        .product:hover {
            background-color: #f0f0f0;
            transform: scale(1.05);
        }
        .product:hover .buy-button {
            background-color: #45a049;
        }
        img {
            width: 50%;
            height: 100%;
            margin-right: 10px;
        }
        .container {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }
        .buy-button {
            background-color: #4CAF50; 
            border: none;
            color: white;
            padding: 15px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            transition-duration: 0.4s;
        }
        .info {
            text-align: left;
            width: 50%;
        }
        h1 {
            color: #333;
        }
        .product {
            background-color: #fafafa;
            border: 1px solid #e0e0e0;
        }
        .buy-button {
            background-color: #ff9800;
        }
        .buy-button:hover {
            background-color: #f57c00;
        }
    </style>
</head><body>
    <h1 style="text-align: center;">Productos de papelería</h1>
    <div class="container">
        <?php foreach ($products as $product): ?>
            <div class="product">
                <img src="<?php echo $product['image']; ?>" alt="<?php echo $product['name']; ?>">
                <div class="info">
                    <h2><?php echo $product['name']; ?></h2>
                    <p><?php echo $product['description']; ?></p>
                    <p>Precio: <?php echo $product['price']; ?> MXN</p>
                    <form method="post" action="">
                        <input type="hidden" name="producto_id" value="<?php echo $product['id']; ?>">
                        <input type="submit" name="agregar_al_carrito" value="Comprar">
                    </form>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <h2>Carrito de compras</h2>
    <div class="carrito">
        <?php foreach ($_SESSION['carrito'] as $producto_id => $cantidad): ?>
            <p><?php echo $products[$producto_id - 1]['name']; ?>: <?php echo $cantidad; ?></p>
        <?php endforeach; ?>
        <p>Total a pagar: <?php echo calcularTotalPagar($products, $_SESSION['carrito']); ?> MXN</p>
    </div>
    <form method="post" action="">
        <input type="submit" name="comprar_ahora" value="Comprar ahora">
    </form>

    <?php if (isset($mensajeCompra)) : ?>
        <p><?php echo $mensajeCompra; ?></p>
    <?php endif; ?>



</body>
</html>