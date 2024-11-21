<?php

class Utilisateurs{
    private $id_utile;
    private $login;
    private $pass;
    private $role;
    
    public function __construct( $id_utile,  $login,  $pass,  $role){
        $this->id_utile = $id_utile;
        $this->login = $login;
        $this->pass = $pass;
        $this->role = $role;
    }

	public function getIdUtile() {return $this->id_utile;}

	public function getLogin() {return $this->login;}

	public function getPass() {return $this->pass;}

	public function getRole() {return $this->role;}

	public function setIdUtile( $id_utile): void {$this->id_utile = $id_utile;}

	public function setLogin( $login): void {$this->login = $login;}

	public function setPass( $pass): void {$this->pass = $pass;}

	public function setRole( $role): void {$this->role = $role;}

	

}