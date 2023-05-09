
<li class="nav-item has-treeview">
    <a href="?route=dashboard" class="nav-link">
        <i class="nav-icon fas fa-tachometer-alt"></i>
        <p>
            Tableau de bord
        </p>
    </a>
</li>
<li class="nav-item has-treeview">
    <a href="?route=infoprofil" class="nav-link">
        <i class="nav-icon fa fa-user"></i>
        <p>
            Gérer le profil
        </p>
    </a>
</li>

<?php
//Si le membre n'est pas connecté on cache le menu gérer le profil
if($_SESSION['user']['department_id']==6) { ?>

<li class="nav-item has-treeview">
    <a href="?route=manage" class="nav-link">
        <i class="nav-icon fas fa-calendar-alt"></i>
        <p>
            Gérer les congés
        </p>
    </a>
</li>

<?php } ?>

<li class="nav-item has-treeview">
    <a href="?route=deconnexion" class="nav-link">
        <i class="nav-icon fa fa-power-off"></i>
        <p>
            Se déconnecter
        </p>
    </a>
</li>