<?php

// Inclusion de la classe Compte
include "Compte.php";

// Informations de connexion à la base de données
$host = 'localhost';
$dbname = 'compte';
$username = 'root';
$password = '';

try {
    // Connexion à la base de données avec gestion des erreurs PDO
    $pdo = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Connexion à la base de données réussie.<br>";
} catch (PDOException $e) {
    die("Erreur de connexion : " . $e->getMessage());
}

if (!empty($_GET['action'])) {
    $action = $_GET['action'];

    switch ($action) {
        case "new":
            // Inclusion du formulaire pour créer un nouveau compte
            include "Newcompte.php";

            // Vérification si le formulaire a été soumis
            if (isset($_POST['titulaire'], $_POST['solde'])) {
                $titulaire = $_POST['titulaire'];
                $solde = $_POST['solde'];

                // Requête pour insérer un nouveau compte
                $sql = "INSERT INTO comptes (titulaire, solde) VALUES (:titulaire, :solde)";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':titulaire', $titulaire);
                $stmt->bindParam(':solde', $solde);

                // Exécution de la requête et vérification du succès
                if ($stmt->execute()) {
                    echo "Nouveau compte créé avec succès.<br>";
                    header("Location: index.php"); // Redirection vers la page d'accueil après création
                    exit;
                } else {
                    echo "Erreur lors de la création du compte.<br>";
                }
            }
            break;

        case "delete":
            // Suppression d'un compte
            if (isset($_GET['id'])) {
                $stmt = $pdo->prepare("DELETE FROM comptes WHERE id = ?");
                $stmt->execute([$_GET['id']]);
                echo "Compte supprimé avec succès.<br>";
                header("Location: index.php");
                exit;
            }
            break;

        case "update":
            // Mise à jour d'un compte
            if (isset($_POST['id'], $_POST['titulaire'], $_POST['solde'])) {
                $id = $_POST['id'];
                $titulaire = $_POST['titulaire'];
                $solde = $_POST['solde'];

                $sql = "UPDATE comptes SET titulaire = :titulaire, solde = :solde WHERE id = :id";
                $stmt = $pdo->prepare($sql);
                $stmt->bindParam(':titulaire', $titulaire);
                $stmt->bindParam(':solde', $solde);
                $stmt->bindParam(':id', $id);

                if ($stmt->execute()) {
                    echo "Compte mis à jour avec succès.<br>";
                    header("Location: index.php");
                    exit;
                } else {
                    echo "Erreur lors de la mise à jour du compte.<br>";
                }
            }

            // Récupérer les informations du compte avant la mise à jour
            if (isset($_GET['id'])) {
                $stmt = $pdo->prepare("SELECT * FROM banque WHERE id = ?");
                $stmt->execute([$_GET['id']]);
                $compte = $stmt->fetch(PDO::FETCH_ASSOC);

                if ($compte) {
                    // Pré-remplissage du formulaire avec les données du compte
                    include "NewCompte.php";
                }
            }
            break;
    }
} else {
    // Affichage de tous les comptes bancaires
    echo "Liste des comptes :<br>";
    $sql = "SELECT * FROM banque";
    $stmt = $pdo->query($sql);

    // Affichage des résultats sous forme de liste
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "ID : " . $row['id'] . " - Titulaire : " . $row['titulaire'] . " - Solde : " . $row['solde'] . "<br>";
    }

    include "home.php"; // Inclusion de la page d'accueil si elle existe
}
