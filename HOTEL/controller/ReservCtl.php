<?php

class ReservCtl extends AbstractController{

    public function actionReserv(){
        if( isset($_GET['action']) ){
            switch($_GET['action']){
                case "reserver":

                    $mdlCh = new ModelChbre();
                    if(isset($_POST['prenom'])){
                        $mdlCh->insertReserv($_POST);
                    }

                    $chambre = $mdlCh->getChambre($_GET['id']);
                    $this->render("reserver", ["chambre" => $chambre]);
                    break;
            }
        }
    }
}