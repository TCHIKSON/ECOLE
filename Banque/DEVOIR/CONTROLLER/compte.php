<?php
include 'includes/db.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $numeroCompte = $_POST['numeroCompte'];
    $solde = $_POST['solde'];
    $typeDeCompte = $_POST['typeDeCompte'];
    $clientId = $_POST['clientId'];

    $stmt = $pdo->prepare('INSERT INTO comptes (numero_compte, solde, type_compte, clientid) VALUES (?, ?, ?, ?)');
    $stmt->execute([$numeroCompte, $solde, $typeDeCompte, $clientId]);

    header('Location: dashboard/index.php');
    exit();
}
?>