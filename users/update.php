<?php 
session_start();
include '../db.php';
include '../src/php/navbar.php';  // Ajouter la barre de navigation

// Vérifier si l'utilisateur est connecté et si c'est un administrateur
// if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
//     header("Location: ../login.php");
//     exit();
// }

if (isset($_GET['id'])) {
    $user_id = $_GET['id'];
    
    // Récupérer les données de l'utilisateur
    $sql = "SELECT * FROM users WHERE id = $user_id";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    if (!$user) {
        echo "<div class='alert alert-danger'>⚠️ Utilisateur introuvable.</div>";
        exit();
    }
}

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Si un mot de passe a été saisi, le hacher
    if (!empty($password)) {
        $password_hashed = md5($password);
        $sql_update = "UPDATE users SET nom='$nom', prenom='$prenom', email='$email', password='$password_hashed' WHERE id=$user_id";
    } else {
        // Si aucun mot de passe n'est fourni, ne pas mettre à jour le mot de passe
        $sql_update = "UPDATE users SET nom='$nom', prenom='$prenom', email='$email', role='$role' WHERE id=$user_id";
    }

    // Exécuter la requête de mise à jour
    if (mysqli_query($conn, $sql_update)) {
        echo "<div class='alert alert-success' role='alert'>✅ Utilisateur mis à jour avec succès.</div>";
    } else {
        echo "<div class='alert alert-danger' role='alert'>⚠️ Une erreur est survenue lors de la mise à jour.</div>";
    }
}
?>

<div class="container mt-5">
    <h2>Modifier l'utilisateur</h2>

    <form method="POST">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" value="<?= $user['nom'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" value="<?= $user['prenom'] ?>" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="<?= $user['email'] ?>" required>
        </div>
       
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe (laisser vide pour ne pas modifier)</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" name="submit" class="btn btn-success w-100">Mettre à jour l'utilisateur</button>
    </form>
</div>

<?php include '../src/php/footer.php'; ?> <!-- Ajouter le footer -->
