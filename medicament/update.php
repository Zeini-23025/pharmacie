<?php include '../src/php/navbar.php'; ?>
<?php include '../db.php'; ?>

<div class="container mt-5">
  <h2>Modifier un médicament</h2>

  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $result = mysqli_query($conn, "SELECT * FROM medicament WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
  }
  ?>

  <form method="POST" action="">
    <div class="form-group">
      <label for="nom">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $row['nom']; ?>" required>
    </div>
    <div class="form-group">
      <label for="prix">Prix</label>
      <input type="number" step="0.01" class="form-control" id="prix" name="prix" value="<?php echo $row['prix']; ?>" required>
    </div>
    <div class="form-group">
      <label for="quantite">Quantité</label>
      <input type="number" class="form-control" id="quantite" name="quantite" value="<?php echo $row['quantite']; ?>" required>
    </div>
    <div class="form-group">
      <label for="description">Description</label>
      <textarea class="form-control" id="description" name="description"><?php echo $row['description']; ?></textarea>
    </div>
    <button type="submit" name="update" class="btn btn-success">Modifier</button>
  </form>

  <?php
  if (isset($_POST['update'])) {
    $nom = $_POST['nom'];
    $prix = $_POST['prix'];
    $quantite = $_POST['quantite'];
    $description = $_POST['description'];

    $sql = "UPDATE medicament SET nom='$nom', prix=$prix, quantite=$quantite, description='$description' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
      echo "<div class='alert alert-success mt-3'>Médicament modifié avec succès.</div>";
      header("Location: read.php");
    } else {
      echo "<div class='alert alert-danger mt-3'>Erreur : " . mysqli_error($conn) . "</div>";
    }
  }
  ?>
</div>

<?php include '../src/php/footer.php'; ?>
