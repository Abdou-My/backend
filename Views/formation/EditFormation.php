<?php ob_start();
//style="margin-top: 8vh;"
?>

<div class="container">
  <div class="row my-4">
    <div class="col-md-10 mx-auto">
      <div class="card">
        <div class="card-body bg-light">
          <center><h3>Modifier une formation</h3></center>
          <div class="col-md-10 mx-auto">
      
          <form method="POST" action="<?= URL ?>admin/editFormationValidated">
            <div class="form-group">
              <label for="nom" class="form-label mt-4">Libelle de la formation</label>
              <input type="text" class="form-control" id="nom" value="<?= $data[0]['libelle'] ?>" name="lib">
            </div>
              <input type="hidden" value="<?= $data[0]['id_formation'] ?>" name="id">
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
$titre = "Modifier une formation";
require "Views/Template.php";
?>