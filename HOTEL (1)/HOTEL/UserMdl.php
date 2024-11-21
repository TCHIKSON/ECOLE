<?php 

class UserMdl extends ModeleGeneric{
    public function login($username, $mdp){
        $query = "SELECT * FROM utilisateurs WHERE login = :login AND pass = :mdp";

        $res = $this->executerReq($query, ["login" => $username, "mdp" => $mdp]);
        $res = $res->fetch();
        if( $res ){
            extract($res);
            return new Utilisateurs($id_util, $login, $pass, $role);
        }
        return null;
    }
}