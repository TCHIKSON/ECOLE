<?php
include 'connexion_bdd.php';
session_start();

$client_id = $_SESSION['client_id'];

$sql = "SELECT solde FROM comptes WHERE client_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$client_id]);
$compte = $stmt->fetch();

echo "Votre solde actuel est : " . $compte['solde'] . " €";
?>