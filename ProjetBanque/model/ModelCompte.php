<?php

class ModelCompte extends ModeleGeneric {

    // Ajouter un nouveau compte bancaire
    public function ajouterCompte(CompteBancaire $compte) {
        $query = "INSERT INTO comptes VALUES(NULL, :client_id, :solde, :typeCompte)";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            "client_id"  => $compte->getClientId(),
            "solde"      => $compte->getSolde(),
            "typeCompte" => $compte->getTypeDeCompte()
        ]);
    }

    // Récupérer la liste des comptes bancaires d'un client
    public function listeComptes(int $clientId) {
        $stmt = $this->pdo->prepare("SELECT * FROM comptes WHERE client_id = :client_id");
        $stmt->execute(["client_id" => $clientId]);

        $comptes = [];

        // Parcourir les résultats et les transformer en objets CompteBancaire
        while($res = $stmt->fetch()) {
            extract($res);
            $comptes[] = new CompteBancaire($numeroCompte, $solde, $typeDeCompte, $client_id);
        }

        return $comptes;
    }

    // Récupérer un compte spécifique par son ID
    public function getCompteById(int $numeroCompte) {
        $stmt = $this->pdo->prepare("SELECT * FROM comptes WHERE numeroCompte = :numeroCompte");
        $stmt->execute(["numeroCompte" => $numeroCompte]);

        $res = $stmt->fetch();

        if ($res) {
            return new CompteBancaire($res['numeroCompte'], $res['solde'], $res['typeDeCompte'], $res['client_id']);
        }

        return null; // Aucun compte trouvé
    }

    // Récupérer le compte d'un client par son ID
    public function getCompteByClientId(int $clientId) {
        $stmt = $this->pdo->prepare("SELECT * FROM comptes WHERE client_id = :client_id LIMIT 1");
        $stmt->execute(["client_id" => $clientId]);

        $res = $stmt->fetch();

        if ($res) {
            return new CompteBancaire($res['numeroCompte'], $res['solde'], $res['typeDeCompte'], $res['client_id']);
        }

        return null; // Aucun compte trouvé
    }
}
?>
