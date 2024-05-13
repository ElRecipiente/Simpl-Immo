<?php

namespace App\controller;

class Maison extends BienImmobilier
{
    /**
     * @param null $terrain
     * @param bool $isPiscine
     * @param int $etage
     */
    public function __construct($surface, $prix, $localisation, $nb_piece, private $terrain, private $isPiscine, private $etage)
    {
        parent::__construct($surface, $prix, $localisation, $nb_piece);
    }

    public function modifierPrix()
    {
        $nouveauPrix = $this->prix * 2;
    }

}