<?php


session_start();

// Reporting php errors
error_reporting(E_ALL);
ini_set('display_errors',true);
ini_set('display_startup_errors',true);

// configuration
include('../config/env.php');
// database
include('../data/Connection.php');
include('../data/userData.php');
include('../data/vacationData.php');
// controllers
include('../control/authenticateControl.php');
include('../control/dashboardControl.php');
include('../control/profilControl.php');
include ("../control/manageControl.php");
// helpers
include ('../page/helpers/fct_date.php');


$route='';

if (isset($_GET['route'])) {
    $route=$_GET['route'];
}

$action='';

if (isset($_GET['action'])) {
    $action=$_GET['action'];
}


if (!isset($_SESSION['user'])){
    $route='authenticate';
}

// On récupère le paramètre "id" de l'URL
if(isset($_GET['id'])) {
    $id= $_GET['id'];
}else{
    $id='0';
}



switch ($route){
    case 'dashboard':
        switch($action) {
            case 'add':
                $isAdd="add";
                addVacationData();
                header('location:?route=dashboard');
                break;
            case 'cancel':
                cancelVacationData($id);
                header('location:?route=dashboard');
                break;
            default:
                dashboardControl($action, $id);
                break;
        }
        break;
//    case 'dashboard':
//  dashboardControl($action);
//    break;
    case 'department':
//        departmentControl($action);
    break;
    case 'user':
//        userControl($action);
    break;
    case 'vacation':
        vacationControl($action);
    break;
    case 'authenticate':
        authenticateControl($action);
    break;
    case 'manage':
        manageControl($action, $id);
    break;
    case 'infoprofil':
        profilControl($action);
        break;
    case 'deconnexion':
        authenticateControl($action);
        break;
    default :
        include('../page/erreurPage_default.php');
    break;
}



