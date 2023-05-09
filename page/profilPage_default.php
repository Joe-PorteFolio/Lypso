<?php include ('../page/template/header.php'); ?>

    <div class="card-header">
        Votre profil
    </div>
    <div class="card-body">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>rôle</th>


        </tr>
        </thead>
        <tbody>
        <h1> demandes en attentes :</h1>
        <?php
        foreach ($profils as $profil){
            ?>
            <tr>
                <td><?= ($profil['lastname']) ?></td>
                <td><?= ($profil['firstname']) ?></td>
                <td><?php $data = ['6'=>'Direction',
                        '7'=>'Développement',
                        '8'=>'Comptabilité',
                        '9'=>"Commercial"];
                    echo $data[$profil['department_id']]?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

<?php include ('../page/template/footer.php'); ?>