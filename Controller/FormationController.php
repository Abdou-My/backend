<?php 
class FormationController{

    public function displayFormations(){
        $data = FormationManager::getAll();
        echo json_encode($data);
        //include('Views/formation/ListFormation.php');
    }
    public function deleteFormation($id){
        FormationManager::deleteFormation($id);
        //header("location: formations");
    }
    public function getFormation($id){
        $data = FormationManager::getFormation($id);
        echo json_encode($data);
        //include('Views/formation/EditFormation.php');
    }
    public function getDbModules($id){
        $data = FormationManager::getDbModules($id);
        echo json_encode($data);
        //include('Views/formation/EditFormation.php');
    }
    public function getArchive(){
        $data = FormationManager::getArchive();
        echo json_encode($data);
        //include('Views/formation/EditFormation.php');
    }
    public function archiveFormation($id){
        FormationManager::archiveFormation($id);
        
        //include('Views/formateur/ListFormateur.php');
    }
    public function editFormationDb($data){
        FormationManager::editFormation($data);
       // header("location: formations");
    }
    public function createModulesDansFormation($data){
        FormationManager::modulesDansFormation($data);
       // header("location: formations");
    }
    public function editModuleFormationDb($data, $id){
        FormationManager::editModulesDansFormation($data,$id);
       // header("location: formations");
    }
    
    public function createFormation($data){
        FormationManager::newFormation($data);
        //header("location: formations");
    }
    
}
?>