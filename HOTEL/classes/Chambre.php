<?php 

class Chambre{
    private int $numChambre;
    private float $prix;
    private int $nbLits;
    private int $nbPers;
    private string $image;
    private string $description;

    public function __construct(int $numChambre, float $prix, int $nbLits, int $nbPers, string $image, string $description) {
        $this->numChambre = $numChambre;
        $this->prix = $prix;
        $this->nbLits = $nbLits;
        $this->nbPers = $nbPers;
        $this->image = $image;
        $this->description = $description;
    }

    public function getNumChambre(): int {return $this->numChambre;}

	public function getPrix(): float {return $this->prix;}

	public function getNbLits(): int {return $this->nbLits;}

	public function getNbPers(): int {return $this->nbPers;}

	public function getImage(): string {return $this->image;}

	public function getDescription(): string {return $this->description;}

    public function setNumChambre(int $numChambre): void {$this->numChambre = $numChambre;}

	public function setPrix(float $prix): void {$this->prix = $prix;}

	public function setNbLits(int $nbLits): void {$this->nbLits = $nbLits;}

	public function setNbPers(int $nbPers): void {$this->nbPers = $nbPers;}

	public function setImage(string $image): void {$this->image = $image;}

	public function setDescription(string $description): void {$this->description = $description;}

}