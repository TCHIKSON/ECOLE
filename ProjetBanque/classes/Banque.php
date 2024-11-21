<?php

class Banque {
    private array $comptes;

    public function __construct() {
        $this->comptes = [];
    }

    public function ajouterCompte(CompteBancaire $compte): void {
        $this->comptes[$compte->getNumeroCompte()] = $compte;
    }

    public function getCompte(int $numeroCompte): ?CompteBancaire {
        return $this->comptes[$numeroCompte] ?? null;
    }
}
?>
