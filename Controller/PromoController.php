<?php 
class PromoController{

    public function displayPromos(){
        $data = PromoManager::getAll();
        echo json_encode($data);
        //include('Views/formateur/ListFormateur.php');
    }
    public function displayArchive(){
    $data = PromoManager::getArchive();
        echo json_encode($data);
        //include('Views/formateur/ListFormateur.php');
    }
    public function displayTermine(){
        $data = PromoManager::getTermine();
        echo json_encode($data);
        //include('Views/formateur/ListFormateur.php');
    }
    public function displayEnCours(){
        $data = PromoManager::getEnCours();
        echo json_encode($data);
        //include('Views/formateur/ListFormateur.php');
    }
    public function getDbFormation($id){
        $data = PromoManager::getDbFormation($id);
        echo json_encode($data);
        //include('Views/formateur/ListFormateur.php');
    }
    
    public function modulesInPromo($id){
        $data = PromoManager::modulesInPromo($id);
        echo json_encode($data);
        //include('Views/formateur/ListFormateur.php');
    }
    public function getNomPromo($id){
        $data = PromoManager::getNomPromo($id);
        echo json_encode($data);
        //include('Views/formateur/ListFormateur.php');
    }
    public function getDbOrganisme($id){
        $data = PromoManager::getDbOrganisme($id);
        echo json_encode($data);
        //include('Views/formateur/ListFormateur.php');
    }
    public function deletePromo($id){
        PromoManager::deletePromo($id);
        //header("location: formateurs");
    }
    public function archivePromo($id){
        PromoManager::archivePromo($id);
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
    
    public function createPromo($data){
        PromoManager::newPromo($data);
       
    }
    public function editPromo($data,$id){
        PromoManager::editPromo($data,$id);
       
    }
    public function createModuleSessionFormateur($data){
        PromoManager::newModuleSessionFormateur($data);
       
    }
    public function updateModuleSessionFormateur($data,$id){
        PromoManager::updateModuleSessionFormateur($data,$id);  
    }
    public function getPlaning($id){
        $data = PromoManager::getPlaning($id);  
        echo json_encode($data);
    }
    public function createFormateurCompetances($data){
        FormateurManager::newFormateurCompetances($data);
       
    }
    
}
?>