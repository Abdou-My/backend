<?php
class FormateurManager
{
    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM `formateur`');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function deleteFormateur($id)
    {
        $stmt = DB::connect()->prepare('DELETE FROM `formateur` WHERE id_formateur = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function getFormateur($id)
    {
        $stmt = DB::connect()->prepare('SELECT * FROM `formateur` WHERE id_formateur = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function getCompetances($id)
    {
        $stmt = DB::connect()->prepare('SELECT m.id_module, m.nom_module FROM module m inner join competence_formateur cf on cf.id_competence = m.id_module where cf.id_formateur = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function getFormateursByModule($id)
    {
        $stmt = DB::connect()->prepare('SELECT f.id_formateur, f.nom_formateur, f.prenom_formateur FROM formateur f inner join competence_formateur cf on cf.id_formateur=f.id_formateur WHERE cf.id_competence = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function editCompetanceFormateur($data,$id)
    {
        $stmt = DB::connect()->prepare('DELETE FROM competence_formateur WHERE id_formateur = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        
        foreach ($data as $ele) {
            $stmt = DB::connect()->prepare('INSERT INTO `competence_formateur`(`id_formateur`, `id_competence`) VALUES (:idf,:idc)');
            $stmt->bindParam(":idf", $id);
            $stmt->bindParam(":idc", $ele->value);
            $stmt->execute();
        }
    }
    static public function editFormateur($data)
    {
        $stmt = DB::connect()->prepare('UPDATE `formateur` SET `login_formateur`=:logi,`mdp_formateur`=:mdp,`nom_formateur`=:nom,`prenom_formateur`=:pre,`telephone_formateur`=:tel,`email_formateur`=:email WHERE id_formateur = :id');
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
    static public function newFormateur($data)
    {
        $stmt = DB::connect()->prepare('INSERT INTO `formateur`(`login_formateur`, `mdp_formateur`, `nom_formateur`, `prenom_formateur`, `telephone_formateur`, `email_formateur`, `fonction_formateur`) VALUES (:logi, :mdp, :nom, :pre, :tel, :email, "formateur")');
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
    static public function newFormateurCompetances($data)
    {
        $stmt = DB::connect()->prepare('SELECT id_formateur FROM `formateur` ORDER BY id_formateur desc LIMIT 1;');
        $stmt->execute();
        $iden = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $id = $iden[0]['id_formateur'];
        foreach ($data as $ele) {
            $stmt = DB::connect()->prepare('INSERT INTO `competence_formateur`(`id_formateur`, `id_competence`) VALUES (:idf,:idc)');
            $stmt->bindParam(":idf", $id);
            $stmt->bindParam(":idc", $ele->value);
            $stmt->execute();
        }
    }
}
