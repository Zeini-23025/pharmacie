<?php
session_start();
session_unset();  // Supprime toutes les variables de session
session_destroy(); // Détruit la session

// Rediriger vers la page de login après déconnexion
header("Location: login.php");
exit();
?>
