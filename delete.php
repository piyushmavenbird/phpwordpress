<?php
require_once "connection.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM crud WHERE id = $id";

    if (mysqli_query($conn, $sql)) {
        header('Location: read.php');
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
