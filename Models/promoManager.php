<?php
class PromoManager
{
    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT v.nom_organisme, v.nom_agence, f.libelle, p.lieu, p.nom_promotion, p.id_promotion FROM visiteur v inner join promotion p on p.id_visiteur=v.id_visiteur inner join formation f on f.id_formation=p.id_formation WHERE etat= "programmé"');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function getArchive()
    {
        $stmt = DB::connect()->prepare('SELECT v.nom_organisme, v.nom_agence, f.libelle, p.lieu, p.nom_promotion, p.id_promotion FROM visiteur v inner join promotion p on p.id_visiteur=v.id_visiteur inner join formation f on f.id_formation=p.id_formation WHERE etat= "archive"');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function getTermine()
    {
        $stmt = DB::connect()->prepare('SELECT v.nom_organisme, v.nom_agence, f.libelle, p.lieu, p.nom_promotion, p.id_promotion FROM visiteur v inner join promotion p on p.id_visiteur=v.id_visiteur inner join formation f on f.id_formation=p.id_formation WHERE etat= "terminer"');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function getEnCours()
    {
        $stmt = DB::connect()->prepare('SELECT v.nom_organisme, v.nom_agence, f.libelle, p.lieu, p.nom_promotion, p.id_promotion FROM visiteur v inner join promotion p on p.id_visiteur=v.id_visiteur inner join formation f on f.id_formation=p.id_formation WHERE etat= "en cours"');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function getDbFormation($id)
    {
        $stmt = DB::connect()->prepare('SELECT f.id_formation, f.libelle FROM formation f inner join promotion p on p.id_formation=f.id_formation WHERE p.id_promotion = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function getPlaning($id)
    {
        $stmt = DB::connect()->prepare('SELECT msf.date_debut,msf.date_fin, p.nom_promotion, m.nom_module FROM promotion p inner join `module_session_formateur` msf on msf.id_promotion = p.id_promotion inner join module m on m.id_module= msf.id_module WHERE msf.id_promotion=:id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function modulesInPromo($id)
    {
        $stmt = DB::connect()->prepare('SELECT ROW_NUMBER() OVER (ORDER BY id_module) as "iden", m.nom_module as "module", m.id_module, msf.date_debut, msf.date_fin, concat(f.nom_formateur," ",f.prenom_formateur) as "formateur", f.id_formateur FROM module m inner join module_session_formateur msf on msf.id_module=m.id_module inner join formateur f on f.id_formateur=msf.id_formateur where msf.id_promotion=:id order by msf.date_debut asc');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    
    static public function getNomPromo($id)
    {
        $stmt = DB::connect()->prepare('SELECT nom_promotion FROM promotion WHERE id_promotion = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function getDbOrganisme($id)
    {
        $stmt = DB::connect()->prepare('SELECT v.id_visiteur, v.nom_agence, v.ville_agence FROM visiteur v inner join promotion p on p.id_visiteur=v.id_visiteur WHERE p.id_promotion = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function deletePromo($id)
    {
        $stmt = DB::connect()->prepare('DELETE FROM `promotion` WHERE id_promotion = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function archivePromo($id)
    {
        $stmt = DB::connect()->prepare('UPDATE `promotion` SET `etat`="archive" WHERE id_promotion = :id');
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
    static public function newPromo($data)
    {
        $stmt = DB::connect()->prepare('INSERT INTO `promotion`(`nom_promotion`,`id_formation`, `date_debut`, `date_fin`, `lieu`, `etat`, `id_visiteur`) VALUES (:nom, :idf, :dd, :df, :lieu, "Programmé", :idv)');
        $stmt->bindParam(":idf", $data->idf);
        $stmt->bindParam(":dd", $data->dateD);
        $stmt->bindParam(":df", $data->dateF);
        $stmt->bindParam(":lieu", $data->ville);
        $stmt->bindParam(":idv", $data->idv);
        $stmt->bindParam(":nom", $data->nomPromo);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function editPromo($data,$id)
    {
        
        $stmt = DB::connect()->prepare('UPDATE promotion SET id_formation=:idf,
        date_debut=:dd,date_fin=:df,lieu=:lieu,id_visiteur=:idv,
        nom_promotion=:nom WHERE id_promotion=:idp');
        $stmt->bindParam(":idp", $id);
        $stmt->bindParam(":idf", $data->idf);
        $stmt->bindParam(":dd", $data->dateD);
        $stmt->bindParam(":df", $data->dateF);
        $stmt->bindParam(":lieu", $data->ville);
        $stmt->bindParam(":idv", $data->idv);
        $stmt->bindParam(":nom", $data->nomPromo);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function newModuleSessionFormateur($data)
    {
        $stmt = DB::connect()->prepare('SELECT id_promotion FROM `promotion` ORDER BY id_promotion desc LIMIT 1;');
        $stmt->execute();
        $iden = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $id = $iden[0]['id_promotion'];
        foreach ($data as $ele) {
            $stmt = DB::connect()->prepare('INSERT INTO `module_session_formateur`(`id_formateur`, `id_module`, `id_promotion`, `date_debut`, `date_fin`) VALUES (:idf,:idm,:idp,:dd,:df)');
            $stmt->bindParam(":idp", $id);
            $stmt->bindParam(":idf", $ele->formateur);
            $stmt->bindParam(":idm", $ele->module);
            $stmt->bindParam(":dd", $ele->dateDebbut);
            $stmt->bindParam(":df", $ele->dateFiin);
            $stmt->execute();
        }
    }
    static public function updateModuleSessionFormateur($data,$id)
    {
        $stmt = DB::connect()->prepare('DELETE FROM `module_session_formateur` WHERE id_promotion=:id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        foreach ($data as $ele) {
            $stmt = DB::connect()->prepare('INSERT INTO `module_session_formateur`(`id_formateur`, `id_module`, `id_promotion`, `date_debut`, `date_fin`) VALUES (:idf,:idm,:idp,:dd,:df)');
            $stmt->bindParam(":idp", $id);
            $stmt->bindParam(":idf", $ele->id_formateur);
            $stmt->bindParam(":idm", $ele->id_module);
            $stmt->bindParam(":dd", $ele->date_debut);
            $stmt->bindParam(":df", $ele->date_fin);
            $stmt->execute();
        }
    }
}
