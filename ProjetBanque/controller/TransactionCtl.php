<?php

class TransactionCtl extends AbstractController {

    private $model;

    public function __construct() {
        $this->model = new ModelTransaction(); // Modèle pour gérer les transactions
    }

    public function actionsTransaction() {
        if (!empty($_GET['action'])) {
            switch ($_GET['action']) {
                case "depot":
                    // Logique pour ajouter un dépôt
                    if (isset($_POST['montant']) && !empty($_POST['montant'])) {
                        $montant = floatval($_POST['montant']); // Récupérer le montant à déposer
                        $clientId = $_SESSION['client_id']; // Supposons que l'ID du client est stocké en session

                        // Valider le montant
                        if ($montant > 0) {
                            $this->model->deposer($clientId, $montant);
                            echo "<p>Dépôt de $montant € réussi.</p>";
                        } else {
                            echo "<p>Le montant doit être positif.</p>";
                        }
                    } else {
                        echo "<p>Veuillez saisir un montant valide.</p>";
                    }
                    $this->render("depot"); // Rendre la vue du dépôt
                    break;

                case "retrait":
                    // Logique pour retirer de l'argent
                    if (isset($_POST['montant']) && !empty($_POST['montant'])) {
                        $montant = floatval($_POST['montant']); // Récupérer le montant à retirer
                        $clientId = $_SESSION['client_id']; // ID du client

                        // Valider le montant
                        if ($montant > 0) {
                            if ($this->model->retirer($clientId, $montant)) {
                                echo "<p>Retrait de $montant € réussi.</p>";
                            } else {
                                echo "<p>Erreur : Solde insuffisant.</p>";
                            }
                        } else {
                            echo "<p>Le montant doit être positif.</p>";
                        }
                    } else {
                        echo "<p>Veuillez saisir un montant valide.</p>";
                    }
                    $this->render("retrait"); // Rendre la vue du retrait
                    break;

                case "virement":
                    // Logique pour effectuer un virement
                    if (isset($_POST['destinataire_id'], $_POST['montant']) && !empty($_POST['montant'])) {
                        $destinataireId = intval($_POST['destinataire_id']); // ID du destinataire
                        $montant = floatval($_POST['montant']); // Montant à virer
                        $clientId = $_SESSION['client_id']; // ID du client

                        // Valider le montant
                        if ($montant > 0) {
                            if ($this->model->virement($clientId, $destinataireId, $montant)) {
                                echo "<p>Virement de $montant € vers le compte $destinataireId réussi.</p>";
                            } else {
                                echo "<p>Erreur : Solde insuffisant pour effectuer le virement.</p>";
                            }
                        } else {
                            echo "<p>Le montant doit être positif.</p>";
                        }
                    } else {
                        echo "<p>Veuillez saisir un montant valide et un destinataire.</p>";
                    }
                    $this->render("virement"); // Rendre la vue du virement
                    break;
            }
        }
    }
}
?>
