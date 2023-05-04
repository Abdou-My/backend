<?php
class ModuleManager
{
    static public function getAll()
    {
        $stmt = DB::connect()->prepare('SELECT * FROM `module`');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function deleteModule($id)
    {
        $stmt = DB::connect()->prepare('DELETE FROM `module` WHERE id_module = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function getModule($id)
    {
        $stmt = DB::connect()->prepare('SELECT * FROM `module` WHERE id_module = :id');
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function editModule($data)
    {
        $stmt = DB::connect()->prepare('UPDATE `module` SET `nom_module`=:nom,`intitule`=:inti,`description`=:descr WHERE id_module = :id');
        $stmt->bindParam(":id", $data->iden);
        $stmt->bindParam(":nom", $data->nom);
        $stmt->bindParam(":inti", $data->inti);
        $stmt->bindParam(":descr", $data->descr);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
    static public function newModule($data)
    {
        $stmt = DB::connect()->prepare('INSERT INTO `module`(`nom_module`, `intitule`, `description`) VALUES (:nom,:inti,:descr)');
        $stmt->bindParam(":nom", $data->nom);
        $stmt->bindParam(":inti", $data->inti);
        $stmt->bindParam(":descr", $data->descr);
        $stmt->execute();
        $stmt->closeCursor();
        $stmt = null;
    }
}
