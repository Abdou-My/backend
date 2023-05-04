<?php
class FormationManager
{
    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM `formation` f where f.status="active"');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function deleteFormation($id)
    {
        $stmt = DB::connect()->prepare('DELETE FROM `formation` WHERE id_formation = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function getDbModules($id)
    {
        $stmt = DB::connect()->prepare('SELECT m.id_module, m.nom_module FROM `module` m inner join module_formation mf on mf.id_module=m.id_module WHERE mf.id_formation = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function getArchive()
    {
        $stmt = DB::connect()->prepare('SELECT * from `formation` f where f.status="archive"');
      
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function getFormation($id)
    {
        $stmt = DB::connect()->prepare('SELECT * FROM `formation` WHERE id_formation = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function editModulesDansFormation($data,$id)
    {
        $stmt = DB::connect()->prepare('DELETE FROM module_formation WHERE id_formation = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        
        foreach ($data as $ele) {
            $stmt = DB::connect()->prepare('INSERT INTO `module_formation`(`id_module`, `id_formation`) VALUES (:idm,:idf)');
            $stmt->bindParam(":idm", $ele->value);
            $stmt->bindParam(":idf", $id);
            $stmt->execute();
        }
    }
    static public function archiveFormation($id)
    {
        /* get
        $stmt = DB::connect()->prepare('SELECT * FROM formation where id_formation = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
        //insert
        $stmt = DB::connect()->prepare('INSERT INTO `formation_archive`(`id_formation`, `libelle`) VALUES (:id,:lib)');
        $stmt->bindParam(":id", $id);
        $stmt->bindParam(":lib", $data[0]['libelle']);
        $stmt->execute();
        //delete
        $stmt = DB::connect()->prepare('DELETE FROM formation where id_formation = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();*/
        
        $stmt = DB::connect()->prepare('UPDATE `formation` SET `status`="archive" WHERE id_formation = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
    }
    static public function editFormation($data)
    {
        $stmt = DB::connect()->prepare('UPDATE `formation` SET `libelle`=:lib WHERE id_formation = :id');
        $stmt->bindParam(":id", $data->iden);
        $stmt->bindParam(":lib", $data->nom);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function modulesDansFormation($data)
    {

        $stmt = DB::connect()->prepare('SELECT id_formation FROM `formation` ORDER BY id_formation desc LIMIT 1;');
        $stmt->execute();
        $iden = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $id = $iden[0]['id_formation'];
        foreach ($data as $ele) {
            $stmt = DB::connect()->prepare('INSERT INTO `module_formation`(`id_module`, `id_formation`) VALUES (:idm,:idf)');
            $stmt->bindParam(":idm", $ele->value);
            $stmt->bindParam(":idf", $id);
            $stmt->execute();
        }
    }
    static public function newFormation($data)
    {
        $stmt = DB::connect()->prepare('INSERT INTO `formation` (`libelle`,`status`) VALUES (:lib, "active");');
        $stmt->bindParam(":lib", $data->nom);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
}
