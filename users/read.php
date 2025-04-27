<?php 
session_start();
include '../db.php';
include '../src/php/navbar.php';  // Ajouter la barre de navigation

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM users"; // Sélectionner tous les utilisateurs
$result = mysqli_query($conn, $sql);
?>

<div class="container mt-5">
    <h2>Liste des utilisateurs</h2>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                            <td>{$row['nom']}</td>
                            <td>{$row['prenom']}</td>
                            <td>{$row['email']}</td>
                            <td>
                                <a href='update.php?id={$row['id']}' class='btn btn-primary btn-sm'>Modifier</a>
                            </td>
                        </tr>";
                }
            } else {
                echo "<tr><td colspan='5' class='text-center'>Aucun utilisateur trouvé.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</div>

<?php include '../src/php/footer.php'; ?> <!-- Ajouter le footer -->
