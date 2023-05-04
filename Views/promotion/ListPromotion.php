<?php ob_start(); ?>

<div class="container" style="margin-top: 8vh;">
<a class="btn btn-primary" href="NewPromo">Nouvelle promotion</a>
<p></p>
<table class="table table-success table-striped-columns">
  <thead>
    <tr>
      <th scope="col">Nom de la pformation</th>
      <th scope="col">Identifiant de la promotion</th>
      <th scope="col">Date debut</th>
      <th scope="col">Date fin</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <th scope="row">1</th>
      <td>Mark</td>
      <td>Otto</td>
      <td>@mdo</td>
    </tr>
    
  </tbody>
</table>

</div>
<?php 
$content = ob_get_clean();
$titre = "List des formateurs";
require "Views/Template.php";
/*echo('hulala');
$data = new FormateurController();
$response = $data->getAll();
print_r($response);*/

