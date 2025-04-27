<?php include '../src/php/navbar.php'; ?>
<?php include '../db.php';

// if (!isset($_SESSION['user_id'])) {
//     header("Location: ../login.php");
//     exit();
// }

// $user_id = $_SESSION['user_id'];

?>

<div class="container mt-5">
  <h2>Liste des Médicaments</h2>
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prix</th>
        <th>Quantité</th>
        <th>Description</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $sql = "SELECT * FROM medicament";
      $result = mysqli_query($conn, $sql);

      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>{$row['id']}</td>
                <td>{$row['nom']}</td>
                <td>{$row['prix']}</td>
                <td>{$row['quantite']}</td>
                <td>{$row['description']}</td>
                <td>
                  <a href='update.php?id={$row['id']}' class='btn btn-primary'>Modifier</a> |
                  <a href='delete.php?id={$row['id']}' class='btn btn-danger'>Supprimer</a>
                </td>
              </tr>";
      }
      ?>
    </tbody>
  </table>
  <br>
  <a href="create.php" class="btn btn-success mb-3">Créer une nouvelle opération</a>

</div>

<?php include '../src/php/footer.php'; ?>
