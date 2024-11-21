<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $email = $_POST['email'];
    $mdp = password_hash($_POST['mdp'], PASSWORD_BCRYPT); // Hachage du mot de passe

    // Insertion dans la base de données
    $stmt = $pdo->prepare('INSERT INTO client (nom, prenom, email, mdp) VALUES (?, ?, ?, ?)');
    $stmt->execute([$nom, $prenom, $email, $mdp]);

    header('Location: auth/connexion.php');
    exit();
}
?>
