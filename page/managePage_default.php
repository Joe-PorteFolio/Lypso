<?php include ('../page/template/header.php'); ?>

<div class="card-header">
    Les demandes de congés
</div>
<div class="card-body">
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Début</th>
            <th>Fin</th>
            <th>Motif</th>
            <th>Status</th>
            <th>Accepter</th>
            <th>Refuser</th>
        </tr>
        </thead>
        <tbody>
        <h1> demandes en attentes :</h1>
        <?php
        foreach ($waits as $wait){
            ?>
            <tr>
                <td><?= ($wait['lastname']) ?></td>
                <td><?= ($wait['firstname']) ?></td>
                <td><?= date_us2fr($wait['start']) ?></td>
                <td><?= date_us2fr($wait['end']) ?></td>
                <td><?php $raison = [
                        'cp' => 'Congés Annuel',
                        'cs' => 'Congés sans solde',
                        'cc' => 'Congés pour événement familial',
                        'aa' => 'Absence autorisée',
                        'rtt' => 'Jour de réduction du temps de travail',
                    ];
                    echo $raison[$wait['raison']] ?></td>
                <td><?php $data = ['0'=>'En attente',
                        '1'=>'Accepté',
                        '2'=>'Refusé',
                        '3'=>"En cours d'annulation",
                        '4' => "Annulé"];
                    echo $data[$wait['status']]?></td>
                <td><a class="fas fa-check-circle btn btn-block btn-success" href="?route=manage&action=acc&id=<?= ($wait['id']) ?>"></a></td>
                <td><a class="fas fa-window-close btn btn-block btn-danger" href="?route=manage&action=ref&id=<?= ($wait['id']) ?>"></a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <h1> Demandes en attente d'annulation : </h1>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Début</th>
            <th>Fin</th>
            <th>Motif</th>
            <th>Status</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($cancels as $cancel){
            ?>
            <tr>
                <td><?= ($cancel['lastname']) ?></td>
                <td><?= ($cancel['firstname']) ?></td>
                <td><?= date_us2fr($cancel['start']) ?></td>
                <td><?= date_us2fr($cancel['end']) ?></td>
                <td><?php $raison = [
                        'cp' => 'Congés Annuel',
                        'cs' => 'Congés sans solde',
                        'cc' => 'Congés pour événement familial',
                        'aa' => 'Absence autorisée',
                        'rtt' => 'Jour de réduction du temps de travail',
                    ];
                    echo $raison[$cancel['raison']] ?></td>
                <td><?php $data = ['0'=>'En attente',
                        '1'=>'Accepté',
                        '2'=>'Refusé',
                        '3'=>"En cours d'annulation",
                        '4' => "Annulé"];
                    echo $data[$cancel['status']]?></td>
                <td><a class="fas fa-check-circle btn btn-block btn-success" href="?route=manage&action=acccancel&id=<?= ($cancel['id']) ?>"></a></td>
                <td><a class="fas fa-window-close btn btn-block btn-danger" href="?route=manage&action=refcancel&id=<?= ($cancel['id']) ?>"></a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <h1> Toutes les autres demandes : </h1>
            <table class="table table-striped table-bordered">
                <thead>
                <tr>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Début</th>
                    <th>Fin</th>
                    <th>Motif</th>
                    <th>Status</th>

                </tr>
                </thead>
                <tbody>
        <?php
        foreach ($vacations as $vacation){
            ?>
            <tr>
                <td><?= ($vacation['lastname']) ?></td>
                <td><?= ($vacation['firstname']) ?></td>
                <td><?= date_us2fr($vacation['start']) ?></td>
                <td><?= date_us2fr($vacation['end']) ?></td>
                <td><?php $raison = [
                        'cp' => 'Congés Annuel',
                        'cs' => 'Congés sans solde',
                        'cc' => 'Congés pour événement familial',
                        'aa' => 'Absence autorisée',
                        'rtt' => 'Jour de réduction du temps de travail',
                    ];
                    echo $raison[$vacation['raison']] ?></td>
                <td><?php $data = ['0'=>'En attente',
                        '1'=>'Accepté',
                        '2'=>'Refusé',
                        '3'=>"En cours d'annulation",
                        '4' => "Annulé"];
                    echo $data[$vacation['status']]?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

</div>

<?php include ('../page/template/footer.php'); ?>