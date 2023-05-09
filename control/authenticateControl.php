<?php 

function authenticateControl($userAction){
    switch ($userAction){
        case "login":
            $login=$_POST['login'];
            $password=$_POST['password'];
            authenticateControl_loginAction($login,$password);
            break;
        case "logout":
            authenticateControl_logoutAction();
            break;

        default:
            authenticateControl_defaultAction();
            break;
    }
}


function authenticateControl_defaultAction()
{
    $tabTitle="Connexion";
    $message='';
    include('../page/authenticatePage_default.php');
}

function authenticateControl_loginAction($login,$password)
{
    // Appel du modèle pour chercher le mail et le mdp crypté dans la bdd
    $user=userData_findOneWithCredentials($login,$password);

    if (!$user){
         // Pas d'utilisateur avec ce mail et ce mot de passe. On prépare un message pour la vue
         $message="Vos identifiants sont incorrects. Merci de réessayer";
         // On appelle la vue par défaut
         $tabTitle="Connexion";
         include('../page/authenticatePage_default.php');
    }
    else{
        // Code s'il lutilisateur existe dans la table user
        if ($user['active']){
            // L'utilisateur a le droit d'accès
            $_SESSION['user']=$user;
            header('location:./?route=dashboard');
        }
        else{
            // On informe l'utilisateur qu'il n'a pas le droit d'accès
            $message="Vous n'êtes pas autorisé à accéder à l'application. Veuillez contatcter votre administrateur.";
            // On appelle la vue par défaut
            $tabTitle="Connexion";
            include('../page/authenticatePage_default.php');
        }
    }
}

function authenticateControl_logoutAction()
{
   // Code pour la déconnexion
   unset($_SESSION);
   session_destroy();
   header('location:?route=authenticate');
}
