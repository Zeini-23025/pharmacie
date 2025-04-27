<?php include '../src/php/navbar.php'; ?>
<?php include '../db.php'; ?>

<div class="container mt-5">
  <h2>Supprimer un médicament</h2>

  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM medicament WHERE id=$id";

    if (mysqli_query($conn, $sql)) {
      echo "<div class='alert alert-success mt-3'>Médicament supprimé avec succès.</div>";
      header("Location: read.php");
    } else {
      echo "<div class='alert alert-danger mt-3'>Erreur : " . mysqli_error($conn) . "</div>";
    }
  }
  ?>
</div>

<?php include '../src/php/footer.php'; ?>
