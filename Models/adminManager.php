<?php 
class AdminManager {
    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM `admin`');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function deleteAdmin($id){
        $stmt = DB::connect()->prepare('DELETE FROM `admin` WHERE id_admin = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function getAdmin($id){
        $stmt = DB::connect()->prepare('SELECT * FROM `admin` WHERE id_admin = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function editAdmin($data){
        $stmt = DB::connect()->prepare('UPDATE `admin` SET `login_admin`=:logi,`mdp_admin`=:mdp,`nom_admin`=:nom,`prenom_admin`=:pre,`telephone_admin`=:tel,`email_admin`=:email WHERE id_admin = :id');
        $stmt->bindParam(":id", $data->iden);
        $stmt->bindParam(":nom", $data->nom);
        $stmt->bindParam(":pre", $data->prenom);
        $stmt->bindParam(":logi", $data->logi);
        $stmt->bindParam(":mdp", $data->mdp);
        $stmt->bindParam(":email", $data->email);
        $stmt->bindParam(":tel", $data->tel);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function newAdmin($data){
        $stmt = DB::connect()->prepare('INSERT INTO `admin`(`login_admin`, `mdp_admin`, `nom_admin`, `prenom_admin`, `telephone_admin`, `email_admin`, `fonction_admin`) VALUES (:logi, :mdp, :nom, :pre, :tel, :email, "admin")');
        $stmt->bindParam(":nom", $data->nom);
        $stmt->bindParam(":pre", $data->prenom);
        $stmt->bindParam(":logi", $data->logi);
        $stmt->bindParam(":mdp", $data->mdp);
        $stmt->bindParam(":email", $data->email);
        $stmt->bindParam(":tel", $data->tel);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
}
