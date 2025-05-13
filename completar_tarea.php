<?php
session_start();

    $id = $_GET['com'];

    $conexion = mysqli_connect("localhost", "root", "", "tareas") or die("Problemas con la conexión");

    $registros = mysqli_query($conexion, "SELECT completada FROM tareas WHERE $id = id") or die("Problemas en el select: " . mysqli_error($conexion));
    if($reg = mysqli_fetch_array($registros)){
        if ($reg['completada'] == true )
        {
            mysqli_query($conexion, "UPDATE tareas SET completada = false WHERE id = $id") or die("Problemas en el UPDATE: " . mysqli_error($conexion));
            
        }
    
        else   
        {
            mysqli_query($conexion, "UPDATE tareas SET completada = true WHERE id = $id") or die("Problemas en el UPDATE: " . mysqli_error($conexion));
        }
    }


    mysqli_close($conexion);

    header("Location: tareas.php");
    exit;
?>
