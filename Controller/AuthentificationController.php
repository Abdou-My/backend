<?php 

class AuthentificationController {
    private $authManager;

    public function __construct(){
        $this->authManager = new AuthManager();
    }

    public function index(){
        include('Views/AuthentificationView.php');
    }
    public function connexion(){
        if(!empty($_POST['login']) && !empty($_POST['mdp'])){
            $login = Securite::secureHTML($_POST['login']);
            $mdp = Securite::secureHTML($_POST['mdp']);
            if($this->authManager->isUser($login,$mdp)){
                if($_SESSION['function'] == "admin"){
                    header("location: admin/formateurs");
                };
            }else header("location: http://localhost/AlyfPlaning/");
           
        }
       // header("location: admin/formateurs");
    }
}

?>