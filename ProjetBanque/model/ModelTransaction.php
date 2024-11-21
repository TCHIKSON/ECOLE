<?php


include_once  'ModeleGeneric.php';
class ModelTransaction extends ModeleGeneric {

    public function deposer($clientId, $montant) {
        // Logique pour ajouter un dépôt
        // Ajoutez le montant au compte du client
        $query = "UPDATE comptes SET solde = solde + :montant WHERE client_id = :client_id";
        $this->executerReq($query, ['montant' => $montant, 'client_id' => $clientId]);
    }

    public function retirer($clientId, $montant) {
        // Logique pour retirer de l'argent
        $query = "SELECT solde FROM comptes WHERE client_id = :client_id";
        $stmt = $this->executerReq($query, ['client_id' => $clientId]);
        $compte = $stmt->fetch();

        if ($compte && $compte['solde'] >= $montant) {
            $query = "UPDATE comptes SET solde = solde - :montant WHERE client_id = :client_id";
            $this->executerReq($query, ['montant' => $montant, 'client_id' => $clientId]);
            return true; // Retrait réussi
        }
        return false; // Solde insuffisant
    }

    public function virement($clientIdSource, $clientIdDest, $montant) {
        // Logique pour effectuer un virement
        if ($this->retirer($clientIdSource, $montant)) {
            // Ajoutez le montant au compte du destinataire
            $query = "UPDATE comptes SET solde = solde + :montant WHERE client_id = :client_id";
            $this->executerReq($query, ['montant' => $montant, 'client_id' => $clientIdDest]);
            return true; // Virement réussi
        }
        return false; // Virement échoué
    }
}
?>
