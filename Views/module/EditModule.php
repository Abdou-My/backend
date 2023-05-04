<?php ob_start();
//style="margin-top: 8vh;"
?>

<div class="container">
  <div class="row my-4">
    <div class="col-md-10 mx-auto">
      <div class="card">
        <div class="card-body bg-light">
          <center><h3>Modifier un module</h3></center>
          <div class="col-md-10 mx-auto">
      
          <form method="POST" action="<?= URL ?>admin/editModuleValidated">
            <div class="form-group">
              <label for="nom" class="form-label mt-4">Nom de module</label>
              <input type="text" class="form-control" id="nom" value="<?= $data[0]['nom_module'] ?>" name="nom">
            </div>
            <div class="form-group">
              <label for="inti" class="form-label mt-4">Intitule de module</label>
              <input type="text" class="form-control" id="inti" value="<?= $data[0]['intitule'] ?>" name="inti">
            </div>
            <div class="form-group">
              <label for="description" class="form-label mt-4">Description de module</label>
              <textarea class="form-control" id="description"  name="description"><?= $data[0]['description'] ?></textarea>
            </div>
            <input type="hidden" value="<?= $data[0]['id_module'] ?>" name="id">
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
$titre = "Modifier module";
require "Views/Template.php";
?>