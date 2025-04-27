<?php
include '../db.php';
include '../src/php/navbar.php';  // Ajouter la barre de navigation

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM historique WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
        echo "<div class='alert alert-success mt-3'>✅ Opération supprimée avec succès.</div>";
        header("Location: read.php");
    } else {
        echo "<div class='alert alert-danger mt-3'>⚠️ Erreur : " . mysqli_error($conn) . "</div>";
    }
}
?>

<?php include '../src/php/footer.php'; ?> <!-- Ajouter le footer -->
