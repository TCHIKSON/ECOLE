<?php

class Compte{

    private $id;
    private $titulaire;
    private $solde;

    private static $compteur = 0;

    public function __construct($id, $titulaire, $solde){
        $this->id = $id;
        $this->setTitulaire($titulaire);
        $this->setSolde($solde);

        self::$compteur++;
    }

    public function virerVers($comptDest, $montant){
        $this->retirer($montant);
        $comptDest->deposer($montant);
    }

    public function deposer($montant){
        $this->solde += $montant;
    }

    public function retirer($montant){
        $this->solde -= $montant;
    }

    public static function nbCompte(){
        return self::$compteur;
    }

    public function getId(){return $this->id;}
    public function getTitulaire(){return $this->titulaire;}
    public function getSolde(){return $this->solde;}

    public function setId($id){
        $this->id = $id;
    }

    public function setTitulaire($titulaire){
        $this->titulaire = $titulaire;
    }

    public function setSolde($montant){
        $this->solde = $montant;
    }

    public function afficher(){
        return $this->id . " " . $this->titulaire ." ". $this->solde."<br>";
    }

}