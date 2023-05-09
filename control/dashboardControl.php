<?php
function dashboardControl($userAction, $id){
    switch ($userAction){
        case 'cancel':
            cancelVacationControl_defaultAction($id);
            break;
        case 'add':
            addVacationControl_defaultAction();
            break;
        default:
            dashboardControl_defaultAction();
        break;
    }
}
function dashboardControl_defaultAction()
{
    $tabTitle="Tableau de bord";

    $vacationOthers = vacationData_find($_SESSION['user']['id']);
    $vacations = vacationData_findAccepted($_SESSION['user']['id']);

    include('../page/dashboardPage_default.php');
}
function addVacationControl_defaultAction()
{
    addVacationData();
    include('../page/dashboardPage_default.php');
}

function cancelVacationControl_defaultAction($id)
{
    $cancel=cancelVacationData($id);
    include('../page/dashboardPage_default.php');
}