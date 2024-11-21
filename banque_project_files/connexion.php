<?php
include 'connexion_bdd.php'; // fichier pour la connexion à la BD

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $mdp = $_POST['mdp'];

    $sql = "SELECT * FROM client WHERE email = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$email]);
    $client = $stmt->fetch();

    if ($client && password_verify($mdp, $client['mdp'])) {
        session_start();
        $_SESSION['client_id'] = $client['id'];
        header('Location: dashboard.php');
    } else {
        echo "Identifiants incorrects";
    }
}
?>