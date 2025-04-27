<?php
session_start();
include '../db.php';
include '../src/php/navbar.php';  // Ajouter la barre de navigation

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];
?>

<div class="container mt-5">
    <h2>Ajouter une opération</h2>

    <form method="POST">
        <div class="form-group">
            <label for="medicaments">Médicaments :</label><br>
            <?php
            $medicaments = mysqli_query($conn, "SELECT * FROM medicament");
            while ($med = mysqli_fetch_assoc($medicaments)) {
                echo "<input type='checkbox' name='medicaments[]' value='{$med['id']}'> {$med['nom']} (Prix: {$med['prix']})<br>";
            }
            ?>
        </div>
        
        <button type="submit" name="submit" class="btn btn-success mt-3">Enregistrer</button>
    </form>

    <?php
    if (isset($_POST['submit'])) {
        $selected_meds = $_POST['medicaments'];

        if (!empty($selected_meds)) {
            $prix_total = 0;
            $medicament_names = [];

            foreach ($selected_meds as $id_med) {
                $res = mysqli_query($conn, "SELECT nom, prix FROM medicament WHERE id=$id_med");
                $row = mysqli_fetch_assoc($res);
                if ($row) {
                    $prix_total += $row['prix'];
                    $medicament_names[] = $row['nom'];
                }
            }

            $medicament_text = implode(', ', $medicament_names);

            $insert = "INSERT INTO historique (id_user, prix_total, medicaments) 
                       VALUES ('$user_id', '$prix_total', '$medicament_text')";
            mysqli_query($conn, $insert);

            echo "<div class='alert alert-success mt-3'>✅ Opération enregistrée avec succès.</div>";
        } else {
            echo "<div class='alert alert-warning mt-3'>⚠️ Sélectionnez au moins un médicament.</div>";
        }
    }
    ?>

    <br><a href="read.php" class="btn btn-primary">Voir l'historique</a>
</div>

<?php include '../src/php/footer.php'; ?> <!-- Ajouter le footer -->
