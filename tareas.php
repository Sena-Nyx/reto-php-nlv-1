<?php
   session_start();

   header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
   header("Cache-Control: post-check=0, pre-check=0", false);
   header("Pragma: no-cache");

   if (!isset($_SESSION['usuario_id'])) {
      header("Location: index.php");
      exit();
   }
?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Tareas</title>
</head>
<body>
   <h1>Tareas</h1>
   <hr>
   <a href="nueva_tarea.php"><button>Crear Nueva Tarea</button> </a> <br> <br>

   <table border="1" cellpadding="5">
      <tr>
         <th>Título</th>
         <th>Descripción</th>
         <th>Fecha y hora de creacion</th>
         <th>Completada</th>
         <th>Completar Tarea</th>
         <th>Descompletar Tarea</th>
         <th>Editar Tarea</th>
         <th>Eliminar Tarea</th>
      </tr>

      <?php
         $conexion = mysqli_connect('localhost', 'root', '', 'tareas') or die("Problemas con la conexión");

         $registros = mysqli_query($conexion, "SELECT * FROM tareas WHERE usuario_id = '$_SESSION[usuario_id]'") 
         or die("Problemas en el select: " . mysqli_error($conexion));


         while ($reg = mysqli_fetch_array($registros)) 
         {
            echo "<tr>";
            echo "<td>" . $reg['titulo'] . "</td>";
            echo "<td>" . $reg['descripcion'] . "</td>";
            echo "<td>" . $reg['fecha_creacion'] . "</td>";
            echo "<td>" . ($reg['completada'] ? "Si" : "No") . "</td>";
            echo "<td><a href='completar_tarea.php?com=" . $reg['id'] . "'>Completar tarea</a></td>";
            echo "<td><a href='completar_tarea.php?com=" . $reg['id'] . "'>Descompletar tarea</a></td>";
            echo "<td><a href='editar_tarea.php?id=" . $reg['id'] . "'>Editar</a></td>";
            echo "<td><a href='eliminar_tarea.php?id=" . $reg['id'] ."'>Eliminar</a></td>";
            echo "</tr>";
         }
         mysqli_close($conexion);
      ?>
   </table>
   
   <hr>

   <a href="cerrar_sesion.php"><button>Cerrar sesión</button> </a>
</body>
</html>
