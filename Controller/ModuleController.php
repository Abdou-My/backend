<?php 
class ModuleController{

    public function displayModules(){
        $data = ModuleManager::getAll();
        echo json_encode($data);
       // include('Views/Module/ListModule.php');
    }
    public function deleteModule($id){
        ModuleManager::deleteModule($id);
       // header("location: modules");
    }
    public function getModule($id){
        $data = ModuleManager::getModule($id);
        echo json_encode($data);
        //include('Views/Module/EditModule.php');
    }
    public function editModuleDb($data){
        $data = ModuleManager::editModule($data);
        //header("location: modules");
    }
    public function createModule($data){
        ModuleManager::newModule($data);
        //header("location: modules");
    }
    
}
?>