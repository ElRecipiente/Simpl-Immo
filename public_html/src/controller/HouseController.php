<?php

namespace App\controller;

class HouseController extends PropertyController
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