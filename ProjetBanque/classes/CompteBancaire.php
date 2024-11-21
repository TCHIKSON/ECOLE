<?php

class CompteBancaire {
    private int $numeroCompte;
    private float $solde;
    private string $typeDeCompte;
    private int $clientId;

    public function __construct(int $numeroCompte, float $solde, string $typeDeCompte, int $clientId) {
        $this->numeroCompte = $numeroCompte;
        $this->solde = $solde;
        $this->typeDeCompte = $typeDeCompte;
        $this->clientId = $clientId;
    }

    public function getNumeroCompte(): int { return $this->numeroCompte; }
    public function getSolde(): float { return $this->solde; }
    public function getTypeDeCompte(): string { return $this->typeDeCompte; }
    public function getClientId(): int { return $this->clientId; }

    public function setNumeroCompte(int $numeroCompte): void { $this->numeroCompte = $numeroCompte; }
    public function setSolde(float $solde): void { $this->solde = $solde; }
    public function setTypeDeCompte(string $typeDeCompte): void { $this->typeDeCompte = $typeDeCompte; }

    public function deposer(float $montant): void {
        $this->solde += $montant;
    }

    public function retirer(float $montant): bool {
        if ($this->solde >= $montant) {
            $this->solde -= $montant;
            return true;
        } else {
            return false; // Solde insuffisant
        }
    }

    public function effectuerVirement(CompteBancaire $destinataire, float $montant): bool {
        if ($this->retirer($montant)) {
            $destinataire->deposer($montant);
            return true;
        }
        return false;
    }
}
?>
