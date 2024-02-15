<?php
session_start();


if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];

    
    $credenciales = [
        "administrador" => "asd",
        "cliente" => "123"
    ];

   
    if (array_key_exists($usuario, $credenciales) && $credenciales[$usuario] === $contrasena) {
        
        $_SESSION["usuario"] = $usuario;
        
      
        if ($usuario === "administrador") {
            header("Location: admin.php");
        } elseif ($usuario === "cliente") {
            header("Location: productos.php");
        }

        exit();
    } else {
        
        $mensajeError = "Usuario o contraseña incorrectos";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f0f0f0;
        }

        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007BFF;
            color: #fff;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .error {
            color: red;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Iniciar Sesión</h2>

        <?php if (isset($mensajeError)) : ?>
            <p class="error"><?php echo $mensajeError; ?></p>
        <?php endif; ?>

        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="usuario">Usuario:</label>
            <input type="text" id="usuario" name="usuario" required><br>

            <label for="contrasena">Contraseña:</label>
            <input type="password" id="contrasena" name="contrasena" required><br>

            <input type="submit" value="Iniciar Sesión">
        </form>
    </div>
</body>
</html>
