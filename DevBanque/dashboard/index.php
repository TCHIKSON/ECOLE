<?php
session_start();
if (!isset($_SESSION['client_id'])) {
    header('Location: ../auth/connexion.php');
    exit();
}
include '../includes/db.php';

// Récupérer les informations du client connecté
$client_id = $_SESSION['client_id'];
$stmt = $pdo->prepare('SELECT * FROM client WHERE id = ?');
$stmt->execute([$client_id]);
$client = $stmt->fetch();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <title>Tableau de bord</title>
</head>
<body>
<div class="container">
    <h2>Tableau de bord</h2>
    <p><strong>Bienvenue, <?php echo $client['prenom'] . ' ' . $client['nom']; ?></strong></p>
    <p>Votre solde actuel : <strong>€<?php echo number_format($client['solde'], 2); ?></strong></p>
    <a href="depot_retrait.php" class="btn btn-primary">Dépôts/Retraits</a>
    <a href="virement.php" class="btn btn-primary">Effectuer un virement</a>
    <a href="solde.php" class="btn btn-primary">Consulter le solde</a>
    <a href="../auth/deconnexion.php" class="btn btn-danger">Se déconnecter</a>
</div>
</body>
</html>
