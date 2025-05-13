<?php
session_start();
$conexion = mysqli_connect('localhost', 'root', '', 'tareas') or die("Problemas con la conexión");

$tarea_id = $_GET['id'];

$consulta = mysqli_query($conexion, "SELECT titulo, descripcion FROM tareas WHERE id = '$tarea_id' AND usuario_id = '$_SESSION[usuario_id]'")
            or die("Problemas en el select: " . mysqli_error($conexion));

if ($reg = mysqli_fetch_array($consulta)) {
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

   <form action="editar_tarea_php.php" method="post">
      <input type="hidden" name="id" value="<?php echo $tarea_id ?>">
      
      <label>Titulo:</label>
      <input type="text" name="titulo" value="<?php echo $reg['titulo'] ?>"><br><br>

      <label>Descripcion:</label>
      <input type="text" name="descripcion" value="<?php echo $reg['descripcion'] ?>"><br><br>

      <input type="submit" value="Editar">
   </form>
</body>
</html>

<?php
} else {
   echo "No se encontro la tarea.";
}
mysqli_close($conexion);
?>
