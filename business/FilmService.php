<?php

declare(strict_types=1);


require_once('data/FilmDAO.php');
require_once('data/DvdDAO.php');

class FilmService{
    public function getAlle():array{
        $filmsDAO = new FilmDAO();
        $Films = $filmsDAO->getAll();
        return $Films;
    }

    public function titelControle($titel){
        $filmsDAO = new FilmDAO();
        $rowCount = $filmsDAO->controleOpTitel($titel);
        if($rowCount){
            return "Titel bestaat al";
        }else{
            $filmsDAO->voegFilmToe($titel);
        }
    }
    public function filmVerwijderen($filmId){
        $filmDAO = new FilmDAO();
        $filmDAO->filmVerwijderen($filmId);
    }
}