<?php

namespace App\Banque;

use App\Client\Compte as CompteClient;

/**
 * Objet Compte bancaire
 */
    abstract class Compte
    {
        // Mes propriétés

        /**
         * Titulaire du compte
         *
         * @var CompteClient
         */
        private CompteClient $titulaire;

        /**
         * Solde du compte
         *
         * @var float
         */
        protected float $solde;

        // fonction magique qui s'éxecute automatiquement à chaque New
        /**
         * Constructeur du compte bancaire
         *
         * @param CompteClient $compte Compte client du titulaire
         * @param float $montant Montant du solde à l'ouverture
         */
        public function __construct(CompteClient $compte, float $montant = 100)
        {
            // On attribue le nom à la propriét titulaire de l'instance créée
            $this->titulaire = $compte; 

            // On attribue le montant à la propritété solde
            $this->solde = $montant;
        }

        /**
         * Getter de Titulaire - Retourne la valeur du titulaire du compte
         *
         * @return CompteClient
         */
        public function getTitulaire(): CompteClient
        {
            return $this->titulaire;
        }

        /**
         * Modifier le nom du titulaire et retourne l'objet
         *
         * @param CompteClient $compte Compte client du titulaire
         * @return Compte Compte bancaire
         */
        public function setTitulaire(CompteClient $compte): self
        {
            // On vérifie si on a un titulaire
            if(isset($compte)){
                $this->titulaire = $compte;
            }

            return $this;
        }

        // Getter de solde
        /**
         * Retourne le solde du compte
         *
         * @return float Solde du compte
         */
        public function getSolde(): float
        {
            return $this->solde;
        }

        // Setter de solde
        /**
         * Modifier le solde du compte
         *
         * @param float $montant Montant du solde
         * @return Compte Compte bancaire
         */
        public function setSolde(float $montant): self
        {
            if($montant >= 0){
                $this->solde = $montant + ($montant * self::TAUX_INTERETS/100);
            }

            return $this;
        }

        /**
         * Déposer de l'argent sur le compte
         *
         * @param float $montant Montant déposé
         * @return void
         */
        public function deposer(float $montant)
        {
            // On vérifie si le montant est positif
            if($montant > 0){
                $this->solde += $montant;
            }
        }

        /**
         * Retourne une chaîne de caractère affichant le solde
         *
         * @return string
         */
        public function voirSolde()
        {
            echo "Le solde du compte est de $this->solde €";
        }

        /**
         * Retirer un montant du solde du compte
         *
         * @param float $montant Montant à retirer
         * @return void
         */
        public function retirer(float $montant)
        {
            // On vérifie le montant et le solde
            if($montant > 0 && $this->solde >= $montant){
                $this->solde -= $montant;
            }else{
                echo "Montant invalide ou solde insuffisant";
            }
        }
    }