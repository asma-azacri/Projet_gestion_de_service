<?php

$authTableData = [
    'table' => 'users',
    'idfield' => 'login',
    'cfield' => 'mdp',
    'uidfield' => 'uid',
    'rfield' => 'role',
];

$pathFor = [
    "login"         => "/programmationweb/projet_gestion_de_service/trame_auth/login.php",
    "logout"        => "/programmationweb/projet_gestion_de_service/trame_auth/logout.php",
    "adduser"       => "/programmationweb/projet_gestion_de_service/trame_auth/adduser.php",
    "root"          => "/programmationweb/projet_gestion_de_service/trame_auth/",
];

const SKEY = '_Redirect';
