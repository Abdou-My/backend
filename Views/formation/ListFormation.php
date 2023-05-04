<?php ob_start();
//style="margin-top: 8vh;"
?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-20 mx-auto">
            <div class="card">
                <div class="card-body bg-light">
                    <a class="btn btn-primary" href="creerFormation">Nouvelle formation</a>
                    <p></p>
                    <table class="table table-striped-columns" style="background-color:#abe1e3;">
                        <thead style="background-color:#abd5e3; ">
                            <tr style='text-align:center; vertical-align:middle'>
                                <th scope="col">Libelle de formation</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $ele) : ?>
                                <tr>
                                    <td><?= $ele['libelle'] ?></td>
                                    <td style='text-align:center; vertical-align:middle'>
                                        <a class="btn btn-warning btn-sm" href="modifierFormation/<?= $ele['id_formation'] ?>">Modifier</a>
                                    </td>
                                    <td style='text-align:center; vertical-align:middle'>
                                        <form method="POST" action="supprimerFormation" onSubmit="return confirm('Voulez-vous vraiment supprimer');">
                                            <input type="hidden" value=<?= $ele['id_formation'] ?> name="id">
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
$titre = "List des admins";
require "Views/Template.php";
?>