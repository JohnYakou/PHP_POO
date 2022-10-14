<?php

/**
 * Objet Compte bancaire
 */
    class Compte
    {
        // Mes propriétés

        /**
         * Titulaire du compte
         *
         * @var string
         */
        public $titulaire;

        /**
         * Solde du compte
         *
         * @var float
         */
        public $solde;

        // fonction magique qui s'éxecute automatiquement à chaque New
        /**
         * Constructeur du compte bancaire
         *
         * @param string $nom Nom du titulaire
         * @param float $montant Montant du solde à l'ouverture
         */
        public function __construct(string $nom, float $montant = 100)
        {
            // On attribue le nom à la propriét titulaire de l'instance créée
            $this->titulaire = $nom; 

            // On attribue le montant à la propritété solde
            $this->solde = $montant;
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