<?php ob_start();
$tmp = "hahahha";
?>

<div class="container">
  <div class="row my-4">
    <div class="col-md-10 mx-auto">
      <div class="card">
        <div class="card-body bg-light">
          <center>
            <h3>Creer une formation</h3>
          </center>
          <div class="col-md-10 mx-auto">

            <form method="POST" action="<?= URL ?>admin/createFormation">
              <div class="form-group">
                <label for="nom" class="form-label mt-4">Libeller de la formation</label>
                <input type="text" class="form-control" id="nom" name="lib">
              </div>
              <div class="form-group">
              <label for="nom" class="form-label mt-4">Modules</label>
              <select class="form-select" onchange="val()" id="ms" multiple>
  <option value="1">One</option>
  <option value="2">Two</option>
  <option value="3">Three</option>
  <option value="4">Four</option>
  <option value="5">Five</option>
</select>

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
<script>
function val() {
    d = document.getElementById("ms").value;
    alert(d);
}
</script>
<?php
$content = ob_get_clean();
$titre = "Creer une formation";
require "Views/Template.php";
?>