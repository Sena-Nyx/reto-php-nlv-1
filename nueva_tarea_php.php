<?php
   session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Nueva Tarea</title>
</head>
<body>

   <h1>Nueva Tarea</h1>
   
   <?php
      $usuario_id = $_SESSION['usuario_id'];
      $titulo = $_POST['titulo'];
      $descripcion = $_POST['descripcion'];

      $conexion = mysqli_connect('localhost', 'root', '', 'tareas') or die ("Problemas con la conexion");
                                             
      mysqli_query($conexion, "INSERT INTO tareas(titulo, descripcion, usuario_id) VALUES ('$titulo', '$descripcion', '$usuario_id')") 
                                 or die ("Problemas en el insert: " . mysqli_error($conexion));
                                             
      mysqli_close($conexion);

      echo "La tarea fue creada correctamente <br> <br>";
      echo "Para verla vuelva al inicio <br>";

      header("Location: tareas.php");
   ?>
</body>
</html>