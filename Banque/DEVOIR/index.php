<?php

// Inclusion de la classe Compte
include "CONTROLLER/compte.php";

session_start();

include "VUE/dasbord.php";
;

// Informations de connexion à la base de données
$host = 'localhost';
$dbname = 'banque';
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

