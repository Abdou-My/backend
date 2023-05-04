<?php 
class AdminController{

    public function displayAdmins(){
        $data = AdminManager::getAll();
        echo json_encode($data);
    }
    public function deleteAdmin($id){
        AdminManager::deleteAdmin($id);
        
    }
    public function getAdmin($id){
        $data = AdminManager::getAdmin($id);
        echo json_encode($data);
    }
    public function editAdminDb($data){
        AdminManager::editAdmin($data);
       
    }
    public function newAdmin(){
        include('Views/admin/CreateAdmin.php');
    }
    public function createAdmin($data){
        AdminManager::newAdmin($data);
       
    }
    
}
?>