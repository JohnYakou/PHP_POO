<?php

require_once 'classes/Compte.php';
require_once 'classes/CompteCourant.php';
require_once 'classes/CompteEpargne.php';
require_once 'classes/CompteEpargneCourant.php';

// On instantie le compte
$compte1 = new CompteCourant('John', 500, 100);
$compte1->retirer(100);
var_dump($compte1);

echo '<br><br>';

$compteEpargne = new CompteEpargneCourant('John', 800, 10, 200);
var_dump($compteEpargne);

echo '<br><br>';

$compteEpargne->verserInterets();
var_dump($compteEpargne);