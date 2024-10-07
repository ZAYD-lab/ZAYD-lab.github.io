<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") {
        // Capturar las variables enviadas por POST o GET
        $id_producto = $_POST['id_producto'];
        $nombre_pd = $_POST['nombre_pd'];
        $cantidad_pd = $_POST['cantidad_pd'];
        $precio_pd = $_POST['precio_pd'];
    }

    include('db_config.php');
    $conn = conectarDB();

    if (is_string($conn)) {
        echo $conn; 
    } else {
        $sql = "INSERT INTO producto (id_producto, nombre_pd, cantidad_pd, precio_pd) VALUES ('$id_producto', '$nombre_pd', '$cantidad_pd', '$precio_pd')";
        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            echo 'success'; // Enviar respuesta de éxito a AJAX
        } else {
            echo 'error'; // Enviar respuesta de error a AJAX
        }
    // Cerrar la conexión
    $conn->close();
    }
    

?>
