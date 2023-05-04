<?php ob_start();
//style="margin-top: 8vh;"
?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-20 mx-auto">
            <div class="card">
                <div class="card-body bg-light">
                    <a class="btn btn-primary" href="creerModule">Nouveau module</a>
                    <p></p>
                    <table class="table table-striped-columns" style="background-color:#abe1e3;">
                        <thead style="background-color:#abd5e3; ">
                            <tr style='text-align:center; vertical-align:middle'>
                                <th scope="col">Nom de module</th>
                                <th scope="col">Intitule de module</th>
                                <th scope="col">Description de module</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $ele) : ?>
                                <tr>
                                    <td><?= $ele['nom_module'] ?></td>
                                    <td><?= $ele['intitule'] ?></td>
                                    <td><?= $ele['description'] ?></td>
                                   
                                    <td style='text-align:center; vertical-align:middle'>
                                        <a class="btn btn-warning btn-sm" href="modifierModule/<?= $ele['id_module'] ?>">Modifier</a>
                                    </td>
                                    <td style='text-align:center; vertical-align:middle'>
                                        <form method="POST" action="supprimerModule" onSubmit="return confirm('Voulez-vous vraiment supprimer');">
                                            <input type="hidden" value=<?= $ele['id_module'] ?> name="id">
                                            <button class="btn btn-danger btn-sm">Supprimer</button>
                                        </form>
                                    </td>

                                </tr>
                            <?php endforeach; ?>
                            
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
$content = ob_get_clean();
$titre = "List des modules";
require "Views/Template.php";
?>