<?php



abstract class ModeleGeneric {
    protected $pdo;

    public function __construct() {
        // Connexion à la base de données 'banque'
        $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=banque", "root", "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    // Méthode générique pour exécuter des requêtes SQL avec ou sans paramètres
    public function executerReq($query, $data = []) {
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($data);

        // Retourner le résultat de la requête
        return $stmt;
    }
}
?>
