<?php
include_once  "model/ModelTransaction.php"; 
class Transaction {
    private int $id;
    private string $type; // dépôt, retrait, virement
    private float $montant;
    private DateTime $date;
    private int $compteId;

    public function __construct(int $id, string $type, float $montant, DateTime $date, int $compteId) {
        $this->id = $id;
        $this->type = $type;
        $this->montant = $montant;
        $this->date = $date;
        $this->compteId = $compteId;
    }

    public function getId(): int { return $this->id; }
    public function getType(): string { return $this->type; }
    public function getMontant(): float { return $this->montant; }
    public function getDate(): DateTime { return $this->date; }
    public function getCompteId(): int { return $this->compteId; }
}
?>
