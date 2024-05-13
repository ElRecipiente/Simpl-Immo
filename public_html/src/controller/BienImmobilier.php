<?php

namespace App\controller;

use App\model\DBConfig;

/**
 * Definit la class BienImmobilier
 */
class BienImmobilier
{
    private $surface;
    protected $prix;
    private $localisation;
    private $nb_piece;
    private $frais_de_notaire = 8;
    static $TVA = 10;

    public function __construct($surface, $prix, $localisation, $nb_piece)
    {
        $this->surface = $surface;
        $this->prix = $prix;
        $this->localisation = $localisation;
        $this->nb_piece = $nb_piece;
    }

    public function getSurface() {
        return $this->surface;
    }

    /**
     * @return mixed
     */
    public function getPrix() : int
    {
        return $this->prix;
    }

    public function getPrixFNI() : float
    {
        return $this->prix + ($this->prix * $this->frais_de_notaire / 100);
    }

    /**
     * @param int $frais_de_notaire
     * Permet de changer les frais de notaires.
     */
    public function setFraisDeNotaire($frais_de_notaire)
    {
        $this->frais_de_notaire = $frais_de_notaire;
    }

    public function create()
    {
        $db = new DBConfig();

        $db->getConnection();
    }

}