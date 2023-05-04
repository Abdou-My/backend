<?php 
class StagiaireManager {
    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM `stagiaire`');
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        return $data;
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function deleteStagiaire($id){
        $stmt = DB::connect()->prepare('DELETE FROM `stagiaire` WHERE id_stagiaire = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function getStagiaire($id){
        $stmt = DB::connect()->prepare('SELECT * FROM `stagiaire` WHERE id_stagiaire = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $res;
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function editStagiaire($data){
        $stmt = DB::connect()->prepare('UPDATE `stagiaire` SET `nom_stagiaire`=:nom ,`prenom_stagiaire`=:pre, `email_stagiaire`=:email, `telephone_stagiaire`=:tel WHERE id_stagiaire = :id');
        $stmt->bindParam(":id", $data->iden);
        $stmt->bindParam(":nom", $data->nom);
        $stmt->bindParam(":pre", $data->prenom);
        $stmt->bindParam(":email", $data->email);
        $stmt->bindParam(":tel", $data->tel);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function newStagiaire($tmp){
        $stmt = DB::connect()->prepare('INSERT INTO `stagiaire`(`nom_stagiaire`, `prenom_stagiaire`, `email_stagiaire`, `telephone_stagiaire`, `fonction_stagiaire`) VALUES (:nom,:pre,:email,:tel,"stagiaire")');
        $stmt->bindParam(":nom", $tmp->nom);
        $stmt->bindParam(":pre", $tmp->prenom);
        $stmt->bindParam(":email",$tmp->email);
        $stmt->bindParam(":tel", $tmp->tel);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
}
