<?php
   session_start();
?>

<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Login</title>
</head>
<body>
   <?php 
      $conexion = mysqli_connect('localhost', 'root', '', 'tareas') or die ("Problemas con la conexion");

      if ($_SERVER["REQUEST_METHOD"] == "POST") 
      { 
         $correo = $_POST['correo']; 
         $contrasena = $_POST['contrasena'];

         $stmt = $conexion -> prepare("SELECT id, nombre, contrasena FROM usuarios WHERE correo = ?"); 
         $stmt -> bind_param("s", $correo); 
         $stmt -> execute(); 
         $result = $stmt->get_result();

         if ($result && $row = $result->fetch_assoc()) 
         {
            if (password_verify($contrasena, $row['contrasena'])) 
            { 
               $_SESSION['usuario_id'] = $row['id']; 
               $_SESSION['nombre'] = $row['nombre']; 
               header("Location: tareas.php"); 
               exit; 
            }            
            else 
            { 
               echo "Contraseña incorrecta."; 
            } 
         } 
         else 
         { 
            echo "Usuario no encontrado."; 
         } 
         $stmt -> close(); 
      } 
   ?>
</body>
</html>