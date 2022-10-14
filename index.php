<?php

use App\Autoload;
use App\Client\Compte as CompteClient;
use App\Banque\{CompteCourant, CompteEparnge, CompteEpargneCourant};

require_once 'classes/Autoload.php';

Autoload::register();

$client = new CompteClient('Yakou', 'John', 'Paris');
var_dump($client);

echo '<br><br>';

// On instantie le compte
$compte1 = new CompteCourant($client, 500, 100);
$compte1->retirer(100);
var_dump($compte1);

echo '<br><br>';

$compteEpargne = new CompteEpargneCourant($client, 800, 10, 200);
var_dump($compteEpargne);

echo '<br><br>';

$compteEpargne->verserInterets();
var_dump($compteEpargne);