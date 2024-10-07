<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST" || $_SERVER["REQUEST_METHOD"] == "GET") {
        // Capturar las variables enviadas por POST o GET
        $id_producto = $_GET['id_producto'];
        $costo_vt = $_GET['precio']; // Cambiado de 'dinero' a 'costo_vt'
        // Suponiendo que el ID de usuario está definido o autenticado previamente
        $id_usuario = 1; 
    }

    include('db_config.php');
    $conn = conectarDB();

    if (is_string($conn)) {
        echo $conn; 
    } else {
        // Insertar en la tabla Venta con el nuevo campo 'costo_vt'
        $sql = "INSERT INTO Venta (id_venta, id_usuario, costo_vt) VALUES (NULL, '$id_usuario', '$costo_vt')";
        // Ejecutar la consulta
        if ($conn->query($sql) === TRUE) {
            echo 'success'; // Enviar respuesta de éxito
        } else {
            echo 'error'; // Enviar respuesta de error
        }
    // Cerrar la conexión
    $conn->close();
    }

?>
