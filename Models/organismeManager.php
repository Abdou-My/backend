<?php 
class OrganismeManager {
    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT * FROM `visiteur`');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function deleteOrganisme($id){
        $stmt = DB::connect()->prepare('DELETE FROM `visiteur` WHERE id_visiteur = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function getOrganisme($id){
        $stmt = DB::connect()->prepare('SELECT * FROM `visiteur` WHERE id_visiteur = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function editOrganisme($data){
        $stmt = DB::connect()->prepare('UPDATE `visiteur` SET `login_organisme`=:logi,`mdp_organisme`=:mdp,`nom_organisme`=:nom,`nom_agence`=:pre,`ville_agence`=:ville WHERE id_visiteur = :id');
        $stmt->bindParam(":id", $data->iden);
        $stmt->bindParam(":nom", $data->nom);
        $stmt->bindParam(":pre", $data->prenom);
        $stmt->bindParam(":logi", $data->logi);
        $stmt->bindParam(":mdp", $data->mdp);
        $stmt->bindParam(":ville", $data->ville);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function newOrganisme($data){
        $stmt = DB::connect()->prepare('INSERT INTO `visiteur` (`nom_organisme`, `ville_agence`, `nom_agence`, `login_organisme`, `mdp_organisme`, `fonction_organisme`) VALUES (:nom, :ville, :pre, :logi, :mdp, "organisme");');
        $stmt->bindParam(":nom", $data->nom);
        $stmt->bindParam(":pre", $data->prenom);
        $stmt->bindParam(":logi", $data->logi);
        $stmt->bindParam(":mdp", $data->mdp);
        $stmt->bindParam(":ville", $data->ville);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
}
