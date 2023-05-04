<?php 

class AuthManager {
    private function getPasswordUser($login){
        $match = 0;
        $stmt = DB::connect()->prepare('SELECT * FROM `admin` WHERE login_admin = :logi');
        $stmt->bindParam(":logi", $login);
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        if(!empty($results)){
          $match = 1;
          return $results;
        } 
        if($match == 0){
          $stmt = DB::connect()->prepare('SELECT * FROM `formateur` WHERE login_formateur = :logi');
          $stmt->bindParam(":logi", $login);
          $stmt->execute();
          $results = $stmt->fetch(PDO::FETCH_ASSOC);
          $stmt->closeCursor();
          if(!empty($results)){
            $match = 1;
            return $results;
          } 
        }
        if($match == 0){
          $stmt = DB::connect()->prepare('SELECT * FROM `visiteur` WHERE login_formateur = :logi');
          $stmt->bindParam(":logi", $login);
          $stmt->execute();
          $results = $stmt->fetch(PDO::FETCH_ASSOC);
          $stmt->closeCursor();
          if(!empty($results)){
            $match = 1;
            return $results;
          } 
        }
        
        
    }

    public function isUser($login, $mdp){
      $dbMdp = $this->getPasswordUser($login);
      if(!empty($dbMdp)){
        if(password_verify($mdp, $dbMdp['mdp_admin'])){
            $_SESSION['function'] = $dbMdp['fonction_admin'];
            return true;
        }
        if(password_verify($mdp, $dbMdp['mdp_formateur'])){
          $_SESSION['function'] = $dbMdp['fonction_formateur'];
          return true;
        }
        if(password_verify($mdp, $dbMdp['mdp_admin'])){
          $_SESSION['function'] = $dbMdp['fonction_admin'];
          return true;
        }else return false;
      }
    }
}

?>