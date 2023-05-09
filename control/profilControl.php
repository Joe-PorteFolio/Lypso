<?php
function profilControl($userAction){
    switch ($userAction){
        // case à ajouter pour chaque nouvelle action souhaitée
        default:
            profilControl_defaultAction();
            break;
    }
}


function profilControl_defaultAction()
{
    $tabTitle="Gérer son compte";
    $profils=userData_findWithId($_SESSION['user']['id']);
    include('../page/profilPage_default.php');
}


