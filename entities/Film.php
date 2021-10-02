<?php

declare(strict_types=1);

class Film{
    private static $films = array();
    private int $filmId;
    private string $titel;
    
    private function __construct(int $filmId, string $titel){
        $this->filmId = $filmId;
        $this->titel = $titel;
    }

    public static function create(int $filmId,string $titel){
        if(!isset(self::$films[$filmId])){
            self::$films[$filmId]= new Film($filmId, $titel);
        }
        return self::$films[$filmId];
    }

    public function getfilmId():int{
        return $this->filmId;
    }

    public function getTitel():string{
        return $this->titel;
    }
}