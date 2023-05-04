<?php ob_start();
//style="margin-top: 8vh;"
?>

<div class="container">
  <div class="row my-4">
    <div class="col-md-10 mx-auto">
      <div class="card">
        <div class="card-body bg-light">
          <center><h3>Modifier un organisme</h3></center>
          <div class="col-md-10 mx-auto">
      
          <form method="POST" action="<?= URL ?>admin/editOrganismeValidated">
            <div class="form-group">
              <label for="nom" class="form-label mt-4">Nom de l'organisme</label>
              <input type="text" class="form-control" id="nom" value="<?= $data[0]['nom_organisme'] ?>" name="nom">
            </div>
            <div class="form-group">
              <label for="prenom" class="form-label mt-4">Nom de l'agence</label>
              <input type="text" class="form-control" id="prenom" value="<?= $data[0]['nom_agence'] ?>" name="prenom">
            </div>
            <div class="form-group">
              <label for="ville" class="form-label mt-4">Ville de l'agence</label>
              <input type="text" class="form-control" id="ville" value="<?= $data[0]['ville_agence'] ?>" name="ville">
            </div>
            <div class="form-group">
              <label for="logi" class="form-label mt-4">Login de l'organisme</label>
              <input type="text" class="form-control" id="logi" value="<?= $data[0]['login_organisme'] ?>" name="logi">
            </div>
            <div class="form-group">
              <label for="mdp" class="form-label mt-4">Mot de passe de l'organisme</label>
              <input type="text" class="form-control" id="mdp" value="<?= $data[0]['mdp_organisme'] ?>" name="mdp">
              <input type="hidden" value="<?= $data[0]['id_visiteur'] ?>" name="id">
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
$titre = "List des formateurs";
require "Views/Template.php";
?>