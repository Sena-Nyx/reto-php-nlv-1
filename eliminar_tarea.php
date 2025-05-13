<?php
session_start();

$conexion = mysqli_connect("localhost", "root", "", "tareas") or die("Problemas con la conexión");

$tarea_id = $_GET['id'];
$usuario_id = $_SESSION['usuario_id'];

mysqli_query($conexion, "DELETE FROM tareas WHERE id = '$tarea_id' AND usuario_id = '$usuario_id'")
    or die("Error al eliminar la tarea: " . mysqli_error($conexion));

mysqli_close($conexion);

header("Location: tareas.php");
exit;
