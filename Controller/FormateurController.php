<?php 
class FormateurController{

    public function displayFormateurs(){
        $data = FormateurManager::getAll();
        echo json_encode($data);
        //include('Views/formateur/ListFormateur.php');
    }
    public function deleteFormateur($id){
        FormateurManager::deleteFormateur($id);
        //header("location: formateurs");
    }
    public function getFormateur($id){
        $data = FormateurManager::getFormateur($id);
        echo json_encode($data);
        
    }
    public function getCompetances($id){
        $data = FormateurManager::getCompetances($id);
        echo json_encode($data);
        
    }
    public function getFormateurByIdModule($id){
        $data = FormateurManager::getFormateursByModule($id);
        echo json_encode($data);
        
    }
    public function editFormateurDb($data){
        FormateurManager::editFormateur($data);
        
    }
    public function editCompetanceFormateurDb($data,$id){
        FormateurManager::editCompetanceFormateur($data,$id);
        
    }
    
    public function createFormateur($data){
        FormateurManager::newFormateur($data);
       
    }
    public function createFormateurCompetances($data){
        FormateurManager::newFormateurCompetances($data);
       
    }
    
}
?>