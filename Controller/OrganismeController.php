<?php 
class OrganismeController{

    public function displayOrganismes(){
        $data = OrganismeManager::getAll();
        echo json_encode($data);
    }
    public function deleteOrganisme($id){
        OrganismeManager::deleteOrganisme($id);
        
    }
    public function editOrganisme($id){
        $data = OrganismeManager::getOrganisme($id);
        echo json_encode($data);
    }
    public function editOrganismeDb($data){
        OrganismeManager::editOrganisme($data);
        
    }
    
    public function createOrganisme($data){
        OrganismeManager::newOrganisme($data);
        
    }
    
}
?>