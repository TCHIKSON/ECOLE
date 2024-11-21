<?php

class ModelChbre extends ModeleGeneric{

    
    public function ajouter(Chambre $chambre) {
        $query = "INSERT INTO chambre VALUES(NULL, :prix, :lit, :capacite, :img, :desc)";

        $stmt = $this->pdo->prepare($query);
        $stmt->execute([
            "prix"      => $chambre->getPrix(),
            "lit"       => $chambre->getNbLits(),
            "capacite"  => $chambre->getNbPers(),
            "img"       => $chambre->getImage(),
            "desc"      => $chambre->getDescription()
        ]);
    }

    public function liste(){
        $stmt = $this->pdo->prepare("SELECT * FROM chambre");
        $stmt->execute();

        $tab = [];

        while($res = $stmt->fetch()){
            extract($res);
            $tab[] = new Chambre($numChambre, $prix, $nbLits, $nbPers, $image, $description);
        }

        return $tab;
    }

    public function getChambre(int $id){
        $query = "SELECT * FROM chambre WHERE numChambre = :id";

        $res = $this->executerReq($query, ["id" => $id])->fetch();
        extract($res);

        return new Chambre($numChambre, $prix, $nbLits, $nbPers, $image, $description);
    }

}