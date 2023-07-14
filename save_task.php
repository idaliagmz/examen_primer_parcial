<?php
include('db.php');
session_start();

if (isset($_POST['save_task'])) {
    $foliocompra = $_POST['foliocompra'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $cantidad = $_POST['cantidad'];

  $query = "INSERT INTO compras(folio_compra, descripcion_producto, precio, cantidad)
        VALUES ('$foliocompra', 
            '$descripcion', 
            '$precio',
            '$cantidad')";
    $result = mysqli_query($conn, $query);

    if (!$result) {
        die("Query Failed.");
    }

    $_SESSION['message'] = 'Task Saved Successfully';
    $_SESSION['message_type'] = 'success';
    header('Location: index.php');
}
?>