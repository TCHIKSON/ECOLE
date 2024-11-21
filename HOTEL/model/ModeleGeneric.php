<?php

abstract class ModeleGeneric{
    protected $pdo;

    function __construct(){
        $this->pdo = new PDO("mysql:host=127.0.0.1;dbname=hotel", "root", "", [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }

    public function executerReq($query, $data = []){
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($data);

        return $stmt;
    }

    public function insertReserv($data){
        extract($_POST);

        $query= "INSERT INTO client VALUES(NULL, :n, :p, :t)";
        $stmt = $this->executerReq($query, [
            "n" => $nom,
            "p" => $prenom,
            "t" => $tel
        ]);

        $idClt = $this->pdo->lastInsertId();

        $query = "INSERT INTO reservation VALUES(NULL, :cl, :ch, :da, :dp)";
        $this->executerReq($query, [
            "cl" => $idClt,
            "ch" => $numChambre,
            "da" => $dateArrivee,
            "dp" => $dateDepart
        ]);
    }
}