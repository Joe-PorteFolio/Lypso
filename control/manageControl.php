<?php

function manageControl($userAction, $id){
    switch ($userAction){
        case 'ref':
            manageControl_refuseAction($id);
            break;
        case 'acc':
            manageControl_AccepteAction($id);
            break;
        case 'refcancel':
            manageControl_refuseCancel($id);
            break;
        case 'acccancel':
            manageControl_accepteCancel($id);
            break;
        // case à ajouter pour chaque nouvelle action souhaitée
        default:
            manageControl_defaultAction();
            break;
    }
}

function manageControl_refuseAction($id) {
    $refuseManage=vacationData_getRefUpdate($id);

    if ($refuseManage > 0){
        $message = "Refusé";
    }
    else{
        $message = "Une erreur s'est produite";
    }
    $tabTitle="Tableau de bord";
    $waits = vacationData_getWait();
    $vacations = vacationData_getNoWait();
    $cancels= vacationData_getCancel();
    include('../page/managePage_default.php');
}

function manageControl_accepteAction($id) {
    $refuseManage=vacationData_getAccUpdate($id);

    if ($refuseManage > 0){
        $message = "Accepté";
    }
    else{
        $message = "Une erreur s'est produite";
    }
    $tabTitle="Tableau de bord";
    $waits = vacationData_getWait();
    $vacations = vacationData_getNoWait();
    $cancels= vacationData_getCancel();
    include('../page/managePage_default.php');
}

function manageControl_refuseCancel($id) {
    $refuseManage=vacationData_getRefCancel($id);

    if ($refuseManage > 0){
        $message = "Annulation Refusé";
    }
    else{
        $message = "Une erreur s'est produite";
    }
    $tabTitle="Tableau de bord";
    $waits = vacationData_getWait();
    $vacations = vacationData_getNoWait();
    $cancels= vacationData_getCancel();
    include('../page/managePage_default.php');
}

function manageControl_accepteCancel($id) {
    $refuseManage=vacationData_getAccCancel($id);

    if ($refuseManage > 0){
        $message = "Annulation Accepté";
    }
    else{
        $message = "Une erreur s'est produite";
    }
    $tabTitle="Tableau de bord";
    $waits = vacationData_getWait();
    $vacations = vacationData_getNoWait();
    $cancels= vacationData_getCancel();
    include('../page/managePage_default.php');
}


function manageControl_defaultAction()
{
    $tabTitle="Tableau de bord";
    $vacations = vacationData_getNoWait();
    $waits = vacationData_getWait();
    $cancels= vacationData_getCancel();

    if ($_SESSION['user']['department_id']==6) {
        include('../page/managePage_default.php');
    }
    else {
        header('Location: '.'?route=dashboard');
    }
}