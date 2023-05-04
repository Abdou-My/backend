<?php ob_start();
//style="margin-top: 8vh;"
?>

<div class="container">
  <div class="row my-4">
    <div class="col-md-10 mx-auto">
      <div class="card">
        <div class="card-body bg-light">
          <center>
            <h3>Creer un stagiaire</h3>
          </center>
          <div class="col-md-10 mx-auto">

            <form method="POST" action="<?= URL ?>admin/createStagiaire">
              <div class="form-group">
                <label for="nom" class="form-label mt-4">Nom de stagiaire</label>
                <input type="text" class="form-control" id="nom" name="nom">
              </div>
              <div class="form-group">
                <label for="prenom" class="form-label mt-4">Preom de stagiaire</label>
                <input type="text" class="form-control" id="prenom" name="prenom">
              </div>
              <div class="form-group">
                <label for="tel" class="form-label mt-4">Telephone de stagiaire</label>
                <input type="text" class="form-control" id="tel" name="tel">
              </div>
              <div class="form-group">
                <label for="email" class="form-label mt-4">Email de stagiaire</label>
                <input type="email" class="form-control" id="email" name="email">
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
$titre = "Creation de stagiaire";
require "Views/Template.php";
?>