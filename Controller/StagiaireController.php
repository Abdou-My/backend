<?php 
class StagiaireController{

    public function displayStagiaires(){
        $data = StagiaireManager::getAll();
        echo json_encode($data);
       // include('Views/stagiaire/ListStagiaire.php');
    }
    public function deleteStagiaire($id){
       
        StagiaireManager::deleteStagiaire($id);
        
       // header("location: stagiaires");
    }
    public function getStagiaire($id){
        $data = StagiaireManager::getStagiaire($id);
        print_r(json_encode($data));
        return json_encode($data);
       // include('Views/stagiaire/EditStagiaire.php');
    }
    public function editStagiaireDb($data){
        StagiaireManager::editStagiaire($data);
        
       // header("location: stagiaires");
    }
    public function createStagiaire($toto){
        StagiaireManager::newStagiaire($toto);
       // header("location: stagiaires");
    }
    
}
?>