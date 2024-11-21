<?php

class CompteCtl extends AbstractController {
    private $model;
    private $transactionCtl;

    public function __construct() {
        $this->model = new ModelCompte();
        $this->transactionCtl = new TransactionCtl();
    }

    public function actionsCompte() {
        if (!empty($_GET['action'])) {
            switch ($_GET['action']) {
                case "depot":
                    $this->transactionCtl->actionsTransaction(); // Appel des actions liées aux transactions
                    break;

                case "retrait":
                    $this->transactionCtl->actionsTransaction(); // Appel des actions liées aux transactions
                    break;

                case "virement":
                    $this->transactionCtl->actionsTransaction(); // Appel des actions liées aux transactions
                    break;

                // Ajoutez d'autres cas si nécessaire...
            }
        }
    }

    // Ajout de la méthode getModelCompte
    public function getModelCompte() {
        return $this->model; // Retourne le modèle des comptes
    }
}
?>
