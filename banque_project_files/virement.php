<?php
include 'connexion_bdd.php';
session_start();

$client_id = $_SESSION['client_id'];
$destinataire_id = $_POST['destinataire_id'];
$montant = $_POST['montant'];

// Vérification du solde
$sql = "SELECT solde FROM comptes WHERE client_id = ?";
$stmt = $pdo->prepare($sql);
$stmt->execute([$client_id]);
$compte_source = $stmt->fetch();

if ($compte_source['solde'] < $montant) {
    echo "Solde insuffisant pour le virement.";
} else {
    // Débit du compte source
    $nouveau_solde_source = $compte_source['solde'] - $montant;
    $sql_update_source = "UPDATE comptes SET solde = ? WHERE client_id = ?";
    $stmt_update_source = $pdo->prepare($sql_update_source);
    $stmt_update_source->execute([$nouveau_solde_source, $client_id]);

    // Crédit du compte destinataire
    $sql_dest = "SELECT solde FROM comptes WHERE client_id = ?";
    $stmt_dest = $pdo->prepare($sql_dest);
    $stmt_dest->execute([$destinataire_id]);
    $compte_dest = $stmt_dest->fetch();
    
    $nouveau_solde_dest = $compte_dest['solde'] + $montant;
    $sql_update_dest = "UPDATE comptes SET solde = ? WHERE client_id = ?";
    $stmt_update_dest = $pdo->prepare($sql_update_dest);
    $stmt_update_dest->execute([$nouveau_solde_dest, $destinataire_id]);

    echo "Virement réussi";
}
?>