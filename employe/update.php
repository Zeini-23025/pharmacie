<?php include '../src/php/navbar.php'; ?>
<?php include '../db.php'; ?>

<div class="container mt-5">
  <h2>Modifier un employé</h2>

  <?php
  if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Récupérer les infos
    $result = mysqli_query($conn, "SELECT * FROM employe WHERE id=$id");
    $row = mysqli_fetch_assoc($result);
  }

  if (isset($_POST['update'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $salaire = $_POST['salaire'];

    $sql = "UPDATE employe SET nom='$nom', prenom='$prenom', salaire=$salaire WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
      echo "<div class='alert alert-success mt-3'>Employé modifié avec succès.</div>";
      header('Location: read.php');
    } else {
      echo "<div class='alert alert-danger mt-3'>Erreur : " . mysqli_error($conn) . "</div>";
    }
  }
  ?>

  <form method="POST" action="">
    <div class="form-group">
      <label for="nom">Nom</label>
      <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $row['nom']; ?>" required>
    </div>
    <div class="form-group">
      <label for="prenom">Prénom</label>
      <input type="text" class="form-control" id="prenom" name="prenom" value="<?php echo $row['prenom']; ?>" required>
    </div>
    <div class="form-group">
      <label for="salaire">Salaire</label>
      <input type="number" step="0.01" class="form-control" id="salaire" name="salaire" value="<?php echo $row['salaire']; ?>" required>
    </div>
    <button type="submit" name="update" class="btn btn-success">Modifier</button>
  </form>
</div>

<?php include '../src/php/footer.php'; ?>
