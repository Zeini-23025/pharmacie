<?php 
session_start();
include 'db.php';

// Vérifier si l'utilisateur est connecté
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Récupérer les informations de l'utilisateur connecté
$user_nom = $_SESSION['user_nom'];
$user_prenom = $_SESSION['user_prenom'];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Page d'accueil</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <!-- Navbar Bootstrap -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Pharmacie</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/historique/read.php">Historique</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/employe/read.php">Employe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/medicament/read.php">Médicaments</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/users/read.php">Utilisateurs</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Se Déconnecter</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-5">
        <h2>Bienvenue, <?php echo $user_nom . ' ' . $user_prenom; ?> !</h2>
        <p class="lead">Voici un aperçu de vos actions disponibles dans le système de gestion de la pharmacie.</p>

        <div class="row mt-4">
            <!-- Carte Historique -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-header">
                        Historique des opérations
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Voir l'historique</h5>
                        <p class="card-text">Consultez toutes vos opérations et médicaments achetés.</p>
                        <a href="/historique/read.php" class="btn btn-primary">Voir Historique</a>
                    </div>
                </div>
            </div>

            <!-- Carte Ajouter Médicament -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-header">
                        Médicaments
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Gérer les Médicaments</h5>
                        <p class="card-text">Ajoutez, modifiez ou supprimez des médicaments.</p>
                        <a href="/medicament/read.php" class="btn btn-success">Gérer Médicaments</a>
                    </div>
                </div>
            </div>

            <!-- Carte Ajouter Utilisateur -->
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-header">
                        Utilisateurs
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Gérer les Utilisateurs</h5>
                        <p class="card-text">Ajoutez ou modifiez des utilisateurs dans la pharmacie.</p>
                        <a href="/users/read.php" class="btn btn-info">Gérer Utilisateurs</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card">
                    <div class="card-header">
                        Employe
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Gérer les Utilisateurs</h5>
                        <p class="card-text">Ajoutez ou modifiez des Employe dans la pharmacie.</p>
                        <a href="/users/read.php" class="btn btn-warning">Gérer Employe</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer class="bg-dark text-white text-center p-3 mt-5">
        <p>&copy; 2025 Pharmacie. Tous droits réservés.</p>
        <p><a href="mailto:support@pharmacie.com" class="text-white">Contactez-nous</a></p>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
