<?php

class ClientMdl extends ModeleGeneric {

    // Méthode pour la connexion du client
    public function login($email, $mdp) {
        // Requête pour récupérer un client en fonction de l'email
        $query = "SELECT * FROM client WHERE email = :email AND mdp = :mdp" ;        
        $res = $this->executerReq($query, ["email" => $email, "mdp"=>$mdp]);
        $client = $res->fetch();

        if( $client ){
            extract($client);
            return new Client($client['clientId'], $client['nom'], $client['prenom'], $client['email'], $client['mdp'],$client['solde']);
        }
        return null;

    }}

?>
