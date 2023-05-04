<?php ob_start();
//style="margin-top: 8vh;"
?>

<div class="container">
  <div class="row my-4">
    <div class="col-md-10 mx-auto">
      <div class="card">
        <div class="card-body bg-light">
          <center>
            <h3>Creer un module</h3>
          </center>
          <div class="col-md-10 mx-auto">

            <form method="POST" action="<?= URL ?>admin/createModule">
              <div class="form-group">
                <label for="nom" class="form-label mt-4">Nom de module</label>
                <input type="text" class="form-control" id="nom" name="nom">
              </div>
              <div class="form-group">
                <label for="inti" class="form-label mt-4">Intitule de module</label>
                <input type="text" class="form-control" id="inti" name="inti">
              </div>
              <div class="form-group">
                <label for="description" class="form-label mt-4">Description de module</label>
                <textarea type="text" class="form-control" id="description" name="description"></textarea>
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
$titre = "Creation de module";
require "Views/Template.php";
?>