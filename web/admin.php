<!DOCTYPE html>
<html>
<head>
<style>
body {
  font-family: Arial, sans-serif;
}

.header {
  background-color: #0000FF;
  color: white;
  padding: 10px;
  text-align: center;
  font-size: 2em;
  margin-bottom: 20px;
  position: relative;
}

.logout-button {
  background-color: #f44336; 
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  position: absolute;
  top: 10px;
  right: 10px;
  cursor: pointer;
}

.card {
  box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
  transition: 0.3s;
  width: 404.69px;
  height: 98.53px;
  margin: 20px;
  background-color: #FFD700; 
  position: relative;
  overflow: hidden;
}

.card:hover {
  box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
  background-color: #FF4500; 
  transform: scale(2); 
}

.container {
  padding: 10px 16px;
  position: relative;
  z-index: 1;
}

.card img {
  width: 100%;
  height: 100%;
  position: absolute;
  top: 0;
  left: 0;
  opacity: 0;
  transition: opacity 0.3s, transform 0.3s;
}

.card:hover img {
  opacity: 1;
  transform: scale(1);
}
</style>
</head>
<body>

<div class="header">
  Administrador
  <form action="fin.php" method="post">
    <button type="submit" class="logout-button">Cerrar sesión</button>
  </form>
</div>

<?php
$cards = array(
  array("title" => "Venta", "image" => "imagenes\\ventas.jpg"),
  array("title" => "Visitas", "image" => "visitas.jpg"),
  array("title" => "Compra", "image" => "compra.jpg")
);

foreach ($cards as $card) {
  echo '<div class="card">';
  echo '<img src="' . $card["image"] . '" alt="' . $card["title"] . '">';
  echo '<div class="container">';
  echo '<h4><b>' . $card["title"] . '</b></h4>';
  echo '</div>';
  echo '</div>';
}
?>

</body>
</html>
