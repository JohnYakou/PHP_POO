<?php

namespace App\Banque;

use App\Client\Compte as CompteClient;

class CompteEpargneCourant extends CompteEpargne
{
    private $decouvert;

    /**
     * Constructeur de compte courant
     *
     * @param CompteClient $compte Compte client du titulaire
     * @param float $montant Montant du solde à l'ouverture
     * @param integer $decouvert Découvert autorisé
     * @return void
     */
    public function __construct(CompteClient $compte, float $montant, int $taux, int $decouvert)
    {
        // On trasfère les infos nécessaires au constructeurs de Compte
        parent::__construct($compte, $montant, $taux);


        $this->decouvert = $decouvert;
    }

    public function getDecouvert(): int
    {
        return $this->decouvert;
    }

    public function setDecouvert(int $montant): self
    {
        if($montant >= 0){
            $this->decouvert = $montant;
        }

        return $this;
    }

    public function retirer(float $montant)
    {
        // On vérifie si le découvert permet le retrait
        if($montant > 0 && $this->solde - $montant >= -$this->decouvert){
            $this->solde -= $montant;
        }else{
            echo "Solde insuffisant";
        }
    }
}