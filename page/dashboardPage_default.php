<?php include ('../page/template/header.php'); ?>
<div class="card-header">
    Mes demandes de congés
</div>
    <div class="card">
<h2 class="card-body">Faire une demande :</h2>
<!--    <form method="POST" action="?route=dashboard&action=store">
        <div class="input-group mb-3">
        <label class="form-control"     for="dateConge">Date de début : </label>
        <input class="form-control"     type="date"     name="dateConge">
        <label class="form-control"     for="dateFinConge">Date de fin : </label>
        <input class="form-control"     type="date"     name="dateFinConge">
            <div class="col-4">
            <input type="submit" class="btn btn-block btn-primary" value="Envoyez la demande">
            </div>
        </div>
    </form>-->
        <form action="?route=dashboard&action=add" method="post">
            <div class="input-group mb-3">
            <label class="form-control" for="start-date">Date de début</label>
            <input class="form-control" type="date" id="start-date"
                   name="start-date" value="2022-15-12">
            <label class="form-control" for="end-date">Date de fin</label>
            <input class="form-control" type="date" id="end-date"
                   name="end-date" value="2022-15-12">
                <select class="form-control" name="raison">
                    <option value="">--Choisir un motif--</option>
                    <option value="cp">Congés annuels</option>
                    <option value="cs">Congés sans solde</option>
                    <option value="cc">Congés pour événement familial</option>
                    <option value="aa">Absence autorisée</option>
                    <option value="rtt">Jour de réduction du temps de travail</option>
                </select>
                <div class="col-4">
            <input  type="submit" class="btn btn-block btn-primary" value="Envoyer la demande" href="?route=dashboard&action=add">
                </div>
            </div>
        </form>
    </div>
    </div>
<div class="card-body">
    <h1>Demandes acceptées :</h1>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Début</th>
            <th>Fin</th>
            <th>Motif</th>
            <th>Status</th>
            <th>Gérer</th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($vacations as $vacation){
            ?>
            <tr>
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
                <td><a class="btn btn-block btn-danger" href="?route=dashboard&action=cancel&id=<?= ($vacation['id']) ?>">Annuler</a></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

    <h1>Toutes les demandes :</h1>
    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Début</th>
            <th>Fin</th>
            <th>Motif</th>
            <th>Status</th>

        </tr>
        </thead>
        <tbody>
        <?php
        foreach ($vacationOthers as $vacationOther){
            ?>
            <tr>
                <td><?= date_us2fr($vacationOther['start']) ?></td>
                <td><?= date_us2fr($vacationOther['end']) ?></td>
                <td><?php $raison = [
                        'cp' => 'Congés Annuel',
                        'cs' => 'Congés sans solde',
                        'cc' => 'Congés pour événement familial',
                        'aa' => 'Absence autorisée',
                        'rtt' => 'Jour de réduction du temps de travail',
                    ];
                    echo $raison[$vacationOther['raison']] ?></td>
                <td><?php $data = ['0'=>'En attente',
                        '1'=>'Accepté',
                        '2'=>'Refusé',
                        '3'=>"En cours d'annulation",
                        '4' => "Annulé"];
                    echo $data[$vacationOther['status']]?></td>
            </tr>
            <?php
        }
        ?>
        </tbody>
    </table>

</div>

<?php include ('../page/template/footer.php'); ?>