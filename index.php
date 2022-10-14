<?php

require_once 'classes/Compte.php';

// On instantie le compte
$compte1 = new Compte('John', 500);
// $compte1->titulaire = 'John';
// $compte1->solde = 500;

// On déposer 100 €
$compte1->deposer(100);

echo '<br>';

$compte1->voirSolde();

echo '<br>';

// Pour retirer de l'argent
$compte1->retirer(100);

echo '<br>';

var_dump($compte1);

echo '<br>';

// $compte2 = new Compte('Robert');
// // $compte2->titulaire = 'Robert';
// $compte2->solde = 11532.59;
// var_dump($compte2);