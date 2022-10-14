<?php

/**
 * Objet Compte bancaire
 */
    abstract class Compte
    {
        // Mes propriétés

        /**
         * Titulaire du compte
         *
         * @var string
         */
        private $titulaire;

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

        // Accesseurs / Getter
        /**
         * Getter de Titulaire - Retourne la valeur du titulaire du compte
         *
         * @return string
         */
        public function getTitulaire(): string
        {
            return $this->titulaire;
        }

        // Setter
        /**
         * Modifier le nom du titulaire et retourne l'objet
         *
         * @param string $nom Nom du titulaire
         * @return Compte Compte bancaire
         */
        public function setTitulaire(string $nom): self
        {
            // On vérifie si on a un titulaire
            if($nom != ""){
                $this->titulaire = $nom;
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