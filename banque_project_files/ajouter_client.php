<?php
include 'connexion_bdd.php'; // fichier pour la connexion à la BD

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $telephone = $_POST['telephone'];
    $email = $_POST['email'];
    $mdp = password_hash($_POST['mdp'], PASSWORD_DEFAULT); // hachage du mot de passe

    $sql = "INSERT INTO clients (nom, prenom, telephone, email, mdp) 
            VALUES (?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$nom, $prenom, $telephone, $email, $mdp])) {
        echo "Inscription réussie";
    } else {
        echo "Erreur lors de l'inscription";
    }
}
?>