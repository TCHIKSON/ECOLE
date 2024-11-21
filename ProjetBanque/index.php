<?php

session_start();

// Inclusion des classes
include_once  "classes/Client.php";
include_once  "classes/CompteBancaire.php";
include_once  "classes/Transaction.php";
include_once  "classes/Banque.php";


// Inclusion des modèles
include_once  "model/ModeleGeneric.php";
include_once  "model/ModelCompte.php";
include_once  "model/ClientMdl.php";
include_once  "model/ModelTransaction.php"; // Assurez-vous que ce modèle existe

// Inclusion des contrôleurs
include_once  "controller/AbstractController.php";
include_once  "controller/CompteCtl.php";
include_once  "controller/ClientCtl.php";
include_once  "controller/TransactionCtl.php"; // Ajoutez cette ligne pour inclure TransactionCtl

// Instanciation des contrôleurs
$compteCtl = new CompteCtl();
$clientCtl = new ClientCtl();

// Gestion des actions basées sur l'URL
if (isset($_GET["action"])) {
    $clientCtl->actionsClient();
    $compteCtl->actionsCompte();
    $clientCtl->actionsClient();
} else {

        $comptes = $compteCtl->getModelCompte()->listeComptes($_SESSION['client_id']);
        $clientCtl->render("home", ["comptes" => $comptes]); // Rendre la vue d'accueil avec les comptes

}
?>
