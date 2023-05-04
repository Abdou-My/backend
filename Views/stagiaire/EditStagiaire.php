<?php ob_start();
//style="margin-top: 8vh;"
?>

<div class="container">
  <div class="row my-4">
    <div class="col-md-10 mx-auto">
      <div class="card">
        <div class="card-body bg-light">
          <center><h3>Modifier un stagiaire</h3></center>
          <div class="col-md-10 mx-auto">
      
          <form method="POST" action="<?= URL ?>admin/editStagiaireValidated">
            <div class="form-group">
              <label for="nom" class="form-label mt-4">Nom de stagiaire</label>
              <input type="text" class="form-control" id="nom" value="<?= $data[0]['nom_stagiaire'] ?>" name="nom">
            </div>
            <div class="form-group">
              <label for="prenom" class="form-label mt-4">Prenom de stagiaire</label>
              <input type="text" class="form-control" id="prenom" value="<?= $data[0]['prenom_stagiaire'] ?>" name="prenom">
            </div>
            <div class="form-group">
              <label for="tel" class="form-label mt-4">Telephone de stagiaire</label>
              <input type="text" class="form-control" id="tel" value="<?= $data[0]['telephone_stagiaire'] ?>" name="tel">
            </div>
            <div class="form-group">
              <label for="email" class="form-label mt-4">Email de stagiaire</label>
              <input type="text" class="form-control" id="email" value="<?= $data[0]['email_stagiaire'] ?>" name="email">
            </div>
            
              <input type="hidden" value="<?= $data[0]['id_stagiaire'] ?>" name="id">
            
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