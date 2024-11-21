<?php

class UserCtl extends AbstractController{

    private $model;

    public function __construct(){
        $this->model = new UserMdl();
    }

    public function actionsUser(){
        if(!empty($_GET['action'])){
            switch($_GET['action']){

                case "login": 

                    if( isset($_POST['login']) ){
                        $user = $this->model->login($_POST['login'], $_POST['mdp']);
                        
                        if($user){
                            $_SESSION['user']= serialize($user);

                            header('location: .');
                            exit;
                        }
                    }

                    $this->render("login");
                    break;

                case "logout": 
                    session_destroy();

                    header('location: .');
                    exit;
            }
        }
    }

}