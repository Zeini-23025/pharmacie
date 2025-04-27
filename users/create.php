<?php 
session_start();
include '../db.php';
include '../src/php/navbar.php';  // Ajouter la barre de navigation

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit();
}

$user_id = $_SESSION['user_id'];

if (isset($_POST['submit'])) {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Criptage du mot de passe avec MD5
    $password_hashed = md5($password);

    // Vérifier si l'email existe déjà
    $sql_check = "SELECT * FROM users WHERE email='$email'";
    $result_check = mysqli_query($conn, $sql_check);
    if (mysqli_num_rows($result_check) > 0) {
        echo "<div class='alert alert-danger' role='alert'>⚠️ Cet email est déjà utilisé.</div>";
    } else {
        // Insérer les informations de l'utilisateur dans la base de données
        $sql = "INSERT INTO users (nom, prenom, email, password, role) VALUES ('$nom', '$prenom', '$email', '$password_hashed', 'user')";
        if (mysqli_query($conn, $sql)) {
            echo "<div class='alert alert-success' role='alert'>✅ Utilisateur ajouté avec succès.</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>⚠️ Une erreur est survenue lors de l'ajout de l'utilisateur.</div>";
        }
    }
}
?>

<div class="container mt-5">
    <h2>Ajouter un utilisateur</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="nom" class="form-label">Nom</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="mb-3">
            <label for="prenom" class="form-label">Prénom</label>
            <input type="text" class="form-control" id="prenom" name="prenom" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <button type="submit" name="submit" class="btn btn-success w-100">Ajouter l'utilisateur</button>
    </form>
</div>

<?php include '../src/php/footer.php'; ?> <!-- Ajouter le footer -->
