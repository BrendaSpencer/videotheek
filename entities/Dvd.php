<?php
declare(strict_types=1);

class Dvd{
    private int $dvdId;
    private int $dvdNr;
    private Film $film;
    private bool $aanwezig;

    public function __construct( $dvdId, $dvdNr,  $aanwezig, Film $film){
        $this->dvdId = $dvdId;
        $this->dvdNr = $dvdNr;
        $this->aanwezig = $aanwezig;
        $this->film = $film;
    }

    public function getdvdId():int{
        return $this->dvdId;
    }
    public function getDvdNr():int{
        return $this->dvdNr;
    }
    public function getFilm():Film{
        return $this->film;
    }
    public function getAanwezig():bool{
        return $this->aanwezig;
    }
}