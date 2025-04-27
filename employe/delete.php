<?php
include '../db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM employe WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        echo "Employé supprimé.";
        header('Location: read.php');
    } else {
        echo "Erreur : " . mysqli_error($conn);
    }
}
?>
