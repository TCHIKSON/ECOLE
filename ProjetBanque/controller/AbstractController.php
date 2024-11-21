<?php

abstract class AbstractController {

    // Rend la vue avec des données dynamiques
    public function render($vue, array $data = []) {
        ob_start();

        // Extraction des variables pour la vue
        extract($data);
        include_once  "vue/".$vue.".php";

        $content = ob_get_clean();

        // Inclusion du template global
        include_once  "vue/template.php";
    }

    // Vérifie si l'utilisateur est connecté
    public function isConnected() {
        return isset($_SESSION['client']);
    }


    // Récupère les informations de l'utilisateur connecté
    public function getUser() {
        return unserialize($_SESSION['client']) ;
    }

  

    // Déconnexion de l'utilisateur
    public function logout() {
        unset($_SESSION['client']);
        session_destroy();
    }
}
?>
