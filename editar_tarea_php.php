<?php
   session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Editar Tarea</title>
</head>
<body>

<h1>Editar Tarea</h1>

<?php

   $conexion = mysqli_connect('localhost', 'root', '', 'tareas') or die("Problemas con la conexión");

   $tarea_id = $_POST['id'];
   $titulo_nuevo = $_POST['titulo'];
   $descripcion_nueva = $_POST['descripcion'];

   if (empty($titulo_nuevo) || empty($descripcion_nueva)) {
      echo "Debe completar todos los campos.";
   } else {
      mysqli_query($conexion, "UPDATE tareas 
         SET titulo = '$titulo_nuevo', descripcion = '$descripcion_nueva'
         WHERE id = '$tarea_id' AND usuario_id = '$_SESSION[usuario_id]'")
         or die("Problemas en el UPDATE: " . mysqli_error($conexion));

      echo "La tarea fue modificada correctamente.<br><br>";
      echo "<a href='tareas.php'>Volver al inicio</a>";
   }

   mysqli_close($conexion);
?>


</body>
</html>
