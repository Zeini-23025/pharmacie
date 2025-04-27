<?php include '../src/php/navbar.php'; ?>
<?php include '../db.php';


?>

<div class="container mt-5">
  <h2>Liste des employés</h2>

  <table class="table table-bordered">
    <thead class="thead-dark">
      <tr>
        <th>ID</th>
        <th>Nom</th>
        <th>Prénom</th>
        <th>Salaire</th>
        <th>Actions</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $result = mysqli_query($conn, "SELECT * FROM employe");
      while ($row = mysqli_fetch_assoc($result)) {
        echo "<tr>
                <td>" . $row['id'] . "</td>
                <td>" . $row['nom'] . "</td>
                <td>" . $row['prenom'] . "</td>
                <td>" . $row['salaire'] . "</td>
                <td>
                  <a href='update.php?id=" . $row['id'] . "' class='btn btn-primary btn-sm'>Modifier</a>
                  <a href='delete.php?id=" . $row['id'] . "' class='btn btn-danger btn-sm'>Supprimer</a>
                </td>
              </tr>";
      }
      ?>
    </tbody>
  </table>
  <br>
    <a href="create.php" class="btn btn-success">Créer une nouvelle employés</a>
</div>

<?php include '../src/php/footer.php'; ?>
