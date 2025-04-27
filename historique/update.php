<?php
include '../db.php';
include '../src/php/navbar.php';  // Ajouter la barre de navigation

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM historique WHERE id=$id");
$hist = mysqli_fetch_assoc($result);

if (!$hist) {
    die("Opération non trouvée !");
}
?>

<div class="container mt-5">
    <h2>Modifier une opération</h2>

    <form method="POST">
        <div class="form-group">
            <label for="prix_total">Prix Total :</label>
            <input type="text" name="prix_total" value="<?= $hist['prix_total'] ?>" class="form-control" required><br><br>

            <label for="medicaments">Médicaments (séparés par virgule) :</label>
            <textarea name="medicaments" class="form-control" rows="4" required><?= $hist['medicaments'] ?></textarea><br><br>
        </div>
        
        <button type="submit" name="update" class="btn btn-warning">Mettre à jour</button>
    </form>

    <?php
    if (isset($_POST['update'])) {
        $prix_total = $_POST['prix_total'];
        $medicaments = $_POST['medicaments'];

        $update = "UPDATE historique SET prix_total='$prix_total', medicaments='$medicaments' WHERE id=$id";
        mysqli_query($conn, $update);

        echo "<div class='alert alert-success mt-3'>✅ Mise à jour réussie.</div>";
        echo "<br><a href='read.php' class='btn btn-primary'>Retour</a>";
    }
    ?>
</div>

<?php include '../src/php/footer.php'; ?> <!-- Ajouter le footer -->
