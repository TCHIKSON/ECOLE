<?php

class ChambreCtl extends AbstractController{

    private $model;

    public function __construct(){
        $this->model = new ModelChbre();
    }

    public function actionsChambre(){
        if(!empty($_GET['action'])){
            switch($_GET['action']){

                case "ajouter": 

                    if( isset($_POST['prix']) ){
                        $imageName = "";
                        
                        if( !empty($_FILES['image']['name']) ){
                            $infoFile = pathinfo($_FILES['image']['name']);

                            //tableau d'extensions autorisées
                            $extensions = ['jpg', 'jpeg', 'png', 'gif'];
                            $imageName = $infoFile['basename'];

                            if( in_array($infoFile['extension'], $extensions) ){

                                move_uploaded_file($_FILES['image']['tmp_name'], "public/img/".$imageName);
                            }
                        }
                        extract($_POST);

                        $this->model->ajouter(new Chambre(0, $prix, $nbLits, $nbPers, $imageName, $description));

                        header('location: ?action=lister');
                        exit;
                    }

                    $this->render("ajouter");
                    break;

                case "lister": 
                    $chambres = $this->model->liste();
                    
                    $this->render("listerChambre", ["chambres" => $chambres]);
                    break;
            }
        }
    }

    public function getModelChbre(){
        return $this->model;
    }

}