<?php 
session_start();
include '../db.php';
include '../src/php/navbar.php';  // Ajouter la barre de navigation

?>

<div class="container mt-5">
    <h2>Historique des opérations</h2>
    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Utilisateur</th>
                <th>Date</th>
                <th>Prix Total</th>
                <th>Médicaments</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $sql = "SELECT historique.*, users.nom AS nom_user, users.prenom 
                    FROM historique 
                    JOIN users ON historique.id_user = users.id
                    ORDER BY historique.id DESC";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['nom_user']} {$row['prenom']}</td>
                    <td>{$row['date_create']}</td>
                    <td>{$row['prix_total']} €</td>
                    <td>{$row['medicaments']}</td>
                    <td>
                        <a href='update.php?id={$row['id']}' class='btn btn-primary btn-sm'>Modifier</a> | 
                        <a href='delete.php?id={$row['id']}' class='btn btn-danger btn-sm'>Supprimer</a>
                    </td>
                </tr>";
            }
            ?>
        </tbody>
    </table>

    <br>
    <a href="create.php" class="btn btn-success">Créer une nouvelle opération</a>
</div>

<?php include '../src/php/footer.php'; ?>  <!-- Ajouter le footer -->
