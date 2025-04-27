<?php include '../src/php/navbar.php'; ?>
<?php include '../db.php'; 



?>

<div class="container mt-5">
  <h2>Ajouter un employé</h2>

  <form method="POST" action="">
    <div class="form-group">
      <label for="nom">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
    <div class="form-group">
      <label for="prenom">Prénom</label>
      <input type="text" class="form-control" id="prenom" name="prenom" required>
    </div>
    <div class="form-group">
      <label for="salaire">Salaire</label>
      <input type="number" step="0.01" class="form-control" id="salaire" name="salaire" required>
    </div>
    <button type="submit" name="submit" class="btn btn-success m-2">Ajouter</button>
  </form>

  <?php
  if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $salaire = $_POST['salaire'];

    $sql = "INSERT INTO employe (nom, prenom, salaire) VALUES ('$nom', '$prenom', $salaire)";
    if (mysqli_query($conn, $sql)) {
      echo "<div class='alert alert-success mt-3'>Employé ajouté avec succès.</div>";
    } else {
      echo "<div class='alert alert-danger mt-3'>Erreur : " . mysqli_error($conn) . "</div>";
    }
  }
  ?>
  <br><a href="read.php" class="btn btn-primary">Voir employé</a>
</div>

<?php include '../src/php/footer.php'; ?>
