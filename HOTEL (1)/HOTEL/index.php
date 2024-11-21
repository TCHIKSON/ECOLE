<?php

session_start();

include "classes/Chambre.php";
include "classes/Utilisateurs.php";

include "model/ModeleGeneric.php";
include "model/ModelChbre.php";
include "model/UserMdl.php";

include "controller/AbstractController.php";
include "controller/ChambreCtl.php";
include "controller/UserCtl.php";
include "controller/ReservCtl.php";

$chambreClt = new ChambreCtl();
$userCtl = new UserCtl();
$reservCtl = new ReservCtl();

if( isset($_GET["action"]) ){
    $chambreClt->actionsChambre();
    $userCtl->actionsUser();
    $reservCtl->actionReserv();

}else{
    $chambres = $chambreClt->getModelChbre()->liste();
    $chambreClt->render("home", ["chambres" => $chambres]);
}

