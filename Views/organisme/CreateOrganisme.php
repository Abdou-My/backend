<?php ob_start();
//style="margin-top: 8vh;"
?>

<div class="container">
  <div class="row my-4">
    <div class="col-md-10 mx-auto">
      <div class="card">
        <div class="card-body bg-light">
          <center>
            <h3>Creer un organisme</h3>
          </center>
          <div class="col-md-10 mx-auto">

            <form method="POST" action="<?= URL ?>admin/createOrganisme">
              <div class="form-group">
                <label for="nom" class="form-label mt-4">Nom de l'organisme</label>
                <input type="text" class="form-control" id="nom" name="nom">
              </div>
              <div class="form-group">
                <label for="prenom" class="form-label mt-4">Nom de l'agence</label>
                <input type="text" class="form-control" id="prenom" name="prenom">
              </div>
              <div class="form-group">
                <label for="ville" class="form-label mt-4">Ville de l'agence</label>
                <input type="text" class="form-control" id="ville" name="ville">
              </div>
              <div class="form-group">
                <label for="logi" class="form-label mt-4">Login de l'organisme</label>
                <input type="text" class="form-control" id="logi" name="logi">
              </div>
              <div class="form-group">
                <label for="mdp" class="form-label mt-4">Mot de passe de l'organisme</label>
                <input type="text" class="form-control" id="mdp" name="mdp">

              </div>
              <div class="form-group form-check">

              </div>
              <center><button type="submit" class="btn btn-outline-success btn-lg">Terminer</button></center>
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