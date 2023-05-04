<?php ob_start();
//style="margin-top: 8vh;"
?>

<div class="container">
  <div class="row my-4">
    <div class="col-md-10 mx-auto">
      <div class="card">
        <div class="card-body bg-light">
          <center><h3>Modifier un administrateur</h3></center>
          <div class="col-md-10 mx-auto">
      
          <form method="POST" action="<?= URL ?>admin/editAdminValidated">
            <div class="form-group">
              <label for="nom" class="form-label mt-4">Nom de l'admin</label>
              <input type="text" class="form-control" id="nom" value="<?= $data[0]['nom_admin'] ?>" name="nom">
            </div>
            <div class="form-group">
              <label for="prenom" class="form-label mt-4">Preom de l'admin</label>
              <input type="text" class="form-control" id="prenom" value="<?= $data[0]['prenom_admin'] ?>" name="prenom">
            </div>
            <div class="form-group">
              <label for="tel" class="form-label mt-4">Telephone de l'admin</label>
              <input type="text" class="form-control" id="tel" value="<?= $data[0]['telephone_admin'] ?>" name="tel">
            </div>
            <div class="form-group">
              <label for="email" class="form-label mt-4">Email de l'admin</label>
              <input type="text" class="form-control" id="email" value="<?= $data[0]['email_admin'] ?>" name="email">
            </div>
            <div class="form-group">
              <label for="logi" class="form-label mt-4">Login de l'admin</label>
              <input type="text" class="form-control" id="logi" value="<?= $data[0]['login_admin'] ?>" name="logi">
            </div>
            <div class="form-group">
              <label for="mdp" class="form-label mt-4">Mot de passe de l'admin</label>
              <input type="text" class="form-control" id="mdp" value="<?= $data[0]['mdp_admin'] ?>" name="mdp">
              <input type="hidden" value="<?= $data[0]['id_admin'] ?>" name="id">
            </div>
            <div class="form-group form-check">
              
            </div>
            <center><button type="submit" class="btn btn-outline-success btn-lg">Modifier</button></center>
          </form>
  
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<?php
$content = ob_get_clean();
$titre = "Modifier admin";
require "Views/Template.php";
?>