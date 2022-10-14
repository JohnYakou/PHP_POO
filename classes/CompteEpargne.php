<?php

/**
 * Compte avec taux d'intêrets
 */
class CompteEpargne extends Compte
{
    /**
     * Taux d'intêrets du compte
     * @var int
     */
    private $taux_interets;

    /**
     * Constructeur du compté épargne
     *
     * @param string $nom Nom du titulaire
     * @param float $montant Montant du solde à l'ouverture
     * @param integer $taux Taux d'intêret
     */
    public function __construct(string $nom, float $montant, int $taux)
    {
        // On transfère les valeurs nécessaires parent
        parent::__construct($nom, $montant);

        $this->taux_interets = $taux;
    }

    /**
     * Get taux d'intêrets du compte
     *
     * @return  int
     */ 
    public function getTauxInterets(): int
    {
        return $this->taux_interets;
    }

    /**
     * Set taux d'intêrets du compte
     *
     * @param  int  $taux_interets  Taux d'intêrets du compte
     *
     * @return  self
     */ 
    public function setTauxInterets(int $taux_interets): self
    {
        if($taux_interets >= 0){
            $this->taux_interets = $taux_interets;
        }

        return $this;
    }

    public function verserInterets(){
        $this->solde = $this->solde + ($this->solde * $this->taux_interets / 100);
    }
}