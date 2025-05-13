<?php
    session_start();
    session_destroy();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cerrar Sesion</title>
</head>
<body>
    <p>Se ha cerrado sesion correctamente</p>
    <a href="index.php"><button>Volver al login</button> </a>
</body>
</html>