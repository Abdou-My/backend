<?php 
class GroupeManager {
    static public function getAll(){
        $stmt = DB::connect()->prepare('SELECT g.id_groupe, f.libelle, p.nom_promotion, p.date_debut, p.date_fin from formation f inner join promotion p on p.id_formation= f.id_formation inner join groupe g on g.id_promotion=p.id_promotion;');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function getGroupe($id){
        $stmt = DB::connect()->prepare('SELECT p.nom_promotion, g.id_promotion from groupe g inner join promotion p on p.id_promotion = g.id_promotion  where g.id_groupe = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function createStagiaireInGroupeGroupe($data)
    {

        $stmt = DB::connect()->prepare('SELECT id_groupe FROM `groupe` ORDER BY id_groupe desc LIMIT 1;');
        $stmt->execute();
        $iden = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $id = $iden[0]['id_groupe'];
        foreach ($data as $ele) {
            $stmt = DB::connect()->prepare('INSERT INTO `groupe_stagiaire`(`id_stagiaire`, `id_groupe`) VALUES (:idm,:idg)');
            $stmt->bindParam(":idm", $ele->value);
            $stmt->bindParam(":idg", $id);
            $stmt->execute();
        }
    }
    static public function editSinGroupe($data,$id)
    {
        $stmt = DB::connect()->prepare('DELETE FROM groupe_stagiaire WHERE id_groupe = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        
        
            foreach ($data as $ele) {
                $stmt = DB::connect()->prepare('INSERT INTO `groupe_stagiaire` (`id_stagiaire`, `id_groupe`) VALUES (:idm, :idg)');
                $stmt->bindParam(":idm", $ele->value);
                $stmt->bindParam(":idg", $id);
                $stmt->execute();
            }
        
    }
    static public function getSinG($id){
        $stmt = DB::connect()->prepare('SELECT s.nom_stagiaire,s.prenom_stagiaire, g.id_stagiaire from groupe_stagiaire g inner join stagiaire s on s.id_stagiaire = g.id_stagiaire  where g.id_groupe = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function deleteGroup($id){
        $stmt = DB::connect()->prepare('DELETE FROM `groupe` WHERE id_groupe = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function editPromoInGroupe($idp,$idg){
        $stmt = DB::connect()->prepare('UPDATE `groupe` SET `id_promotion`=:idp WHERE id_groupe = :idg');
        $stmt->bindParam(":idg", $idg);
        $stmt->bindParam(":idp", $idp);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function create($id){
        $stmt = DB::connect()->prepare('INSERT INTO `groupe`(`id_promotion`) VALUES (:idp)');
        $stmt->bindParam(":idp", $id);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
}
