<?php include '../src/php/navbar.php'; ?>
<?php include '../db.php';



?>

<div class="container mt-5">
  <h2>Ajouter un médicament</h2>

  <form method="POST" action="">
    <div class="form-group">
      <label for="nom">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom" required>
    </div>
    <div class="form-group">
      <label for="prix">Prix</label>
      <input type="number" step="0.01" class="form-control" id="prix" name="prix" required>
    </div>
    <div class="form-group">
      <label for="quantite">Quantité</label>
      <input type="number" class="form-control" id="quantite" name="quantite" required>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description"></textarea>
    </div>
    <button type="submit" name="submit" class="btn btn-success mt-3">Ajouter</button>
  </form>

  <?php
  if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];
    $description = $_POST['description'];

    $sql = "INSERT INTO medicament (nom, prix, quantite, description) VALUES ('$nom', $prix, $quantite, '$description')";
    if (mysqli_query($conn, $sql)) {
      echo "<div class='alert alert-success mt-3'>Médicament ajouté avec succès.</div>";
    } else {
      echo "<div class='alert alert-danger mt-3'>Erreur : " . mysqli_error($conn) . "</div>";
    }
  }
  ?>
   <br><a href="read.php" class="btn btn-primary">Voir médicament</a>
</div>

<?php include '../src/php/footer.php'; ?>
