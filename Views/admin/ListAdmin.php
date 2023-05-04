<?php ob_start();
//style="margin-top: 8vh;"
?>

<div class="container">
    <div class="row my-4">
        <div class="col-md-20 mx-auto">
            <div class="card">
                <div class="card-body bg-light">
                    <a class="btn btn-primary" href="creerAdmin">Nouveau administrateur</a>
                    <p></p>
                    <table class="table table-striped-columns" style="background-color:#abe1e3;">
                        <thead style="background-color:#abd5e3; ">
                            <tr style='text-align:center; vertical-align:middle'>
                                <th scope="col">Nom de l'admin</th>
                                <th scope="col">Prenom de l'admin</th>
                                <th scope="col">Telephone</th>
                                <th scope="col">Email</th>
                                <th scope="col" colspan="2">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data as $ele) : ?>
                                <tr>
                                    <td><?= $ele['nom_admin'] ?></td>
                                    <td><?= $ele['prenom_admin'] ?></td>
                                    <td><?= $ele['telephone_admin'] ?></td>
                                    <td><?= $ele['email_admin'] ?></td>
                                    <td style='text-align:center; vertical-align:middle'>
                                        <a class="btn btn-warning btn-sm" href="modifierAdmin/<?= $ele['id_admin'] ?>">Modifier</a>
                                    </td>
                                    <td style='text-align:center; vertical-align:middle'>
                                        <form method="POST" action="supprimerAdmin" onSubmit="return confirm('Voulez-vous vraiment supprimer');">
                                            <input type="hidden" value=<?= $ele['id_admin'] ?> name="id">
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