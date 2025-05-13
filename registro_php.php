<!DOCTYPE html>
<html lang="es">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Registro</title>
</head>
<body>
   <?php 
      function comparardatos($contrasena1, $contrasena2)
      {      
         $conexion = mysqli_connect('localhost', 'root', '', 'tareas') or die ("Problemas con la conexion");

         if ($contrasena1 == $contrasena2)
         {
               if ($_SERVER["REQUEST_METHOD"] == "POST") 
               { 
               $nombre = $_POST['nombre']; 
               $correo = $_POST['correo']; 
               $contrasena1 = $_POST['contrasena1'];
      
               $hash = password_hash($contrasena1, PASSWORD_DEFAULT); 
               $stmt = $conexion -> prepare("INSERT INTO usuarios (nombre, correo, contrasena) VALUES (?, ?, ?)"); 
               $stmt->bind_param("sss", $nombre, $correo, $hash); 
      
               if ($stmt->execute()) 
               { 
                  echo "Usuario registrado con éxito.";
                  header("Location: index.php");
                  exit;
               } 
               else { 
                  echo "Error: " . $stmt -> error; 
               } 
               $stmt->close(); 
               } 
         }
   
         else {
               echo "Las 2 contraseñas son distintas";
         }
      }
      $contrasena1 = $_POST['contrasena1'];
      $contrasena2 = $_POST['contrasena2'];

      comparardatos($contrasena1, $contrasena2)
   ?> 
</body>
</html>