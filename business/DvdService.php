<?php

declare(strict_types=1);

require_once('data/DvdDAO.php');
require_once('data/FilmDAO.php');


class DvdService{
    public function getAlle():array{
        $dvdsDAO = new DvdDAO();
        $Dvds = $dvdsDAO->getAll();
        return $Dvds;
    }
    public function zoekOpDvdNr($nummer):?Dvd{
        $dvdsDAO = new DvdDAO();
        $resultaat = $dvdsDAO->getByNumber($nummer);
        return $resultaat;

    }
    public function nrControle($nummer){
        $dvdsDAO = new DvdDAO();
        $resultaat = $dvdsDAO->controleOpNummer($nummer);
        return $resultaat;

    }

    public function dvdToevoegen( $NieuwDvdNr,$filmId){
        $dvdsDAO = new DvdDAO();
        $resultaat = $dvdsDAO->dvdMaken($filmId, $NieuwDvdNr);
    }

    public function wijzigStatus($dvdNr, $status){
        $dvdsDAO = new DvdDAO();
        $resultaat = $dvdsDAO->aanwezigheid($dvdNr, $status);
    }

    public function VerwijderDvd($nummer){
        $dvdsDAO = new DvdDAO();
         $dvdsDAO->verwijderen($nummer);
    }
    
}
