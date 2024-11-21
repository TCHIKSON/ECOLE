<?php

class ClientCtl extends AbstractController {

    private $model;

    public function __construct() {
        $this->model = new ClientMdl(); // Modèle pour gérer les clients
    }

    // Gérer les différentes actions liées à l'utilisateur
    public function actionsClient() {
        if (!empty($_GET['action'])) {
            switch ($_GET['action']) {

                // Connexion d'un client
                case "login": 
                    if (isset($_POST['email'], $_POST['mdp'])) {
                        // Tentative de connexion
                        $client = $this->model->login($_POST['email'], $_POST['mdp']);
                        
                        if ($client) {
                            // Si la connexion est réussie, l'utilisateur est stocké en session
                            $_SESSION['client'] = serialize($client);
                            header('location: ?action=dashboard'); // Redirection vers le tableau de bord
                            exit;
                        } else {
                            echo "<p>Email ou mot de passe incorrect.</p>";
                        }
                    }

                    // Affichage du formulaire de connexion
                    $this->render("login");
                    break;

                // Inscription d'un nouveau client
                case "register": 
                    if (isset($_POST['nom'], $_POST['prenom'], $_POST['email'], $_POST['mdp'])) {
                        // Extraction des données du formulaire d'inscription
                        extract($_POST);
                        
                        // Création d'un nouveau client
                        $this->model->register($nom, $prenom, $email, $mdp);

                        // Redirection vers la page de connexion
                        header('location: ?action=login');
                        exit;
                    }

                    // Affichage du formulaire d'inscription
                    $this->render("register");
                    break;

                // Déconnexion du client
                case "logout": 
                    session_destroy();  // Détruire la session
                    header('location: ?action=login');  // Redirection vers la page de connexion
                    exit;
            }
        }
    }
}
?>
