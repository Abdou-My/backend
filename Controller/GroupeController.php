<?php 
class GroupeController{

    public function displayGroups(){
        $data = GroupeManager::getAll();
        echo json_encode($data);
        
    }
    public function getStagiairesInGroup($id){
        $data = GroupeManager::getSinG($id);
        echo json_encode($data);
        
    }
    public function createStagiaireInGroupeGroupe($data){
        GroupeManager::createStagiaireInGroupeGroupe($data);
       // header("location: formations");
    }
    public function editPromoInGroupe($data,$id){
        GroupeManager::editPromoInGroupe($data,$id);
    }
    public function editSinGroupe($data,$id){
        GroupeManager::editSinGroupe($data,$id);
    }
    public function deleteGroup($id){
        GroupeManager::deleteGroup((int)Securite::secureHtml($id));
    }
    public function getGroup($id){
        $data = GroupeManager::getGroupe($id);
        echo json_encode($data);;
        
    }
    public function newGroup($id){
        $data = GroupeManager::create($id);
    }
    
    
}
?>