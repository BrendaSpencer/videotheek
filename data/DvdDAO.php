<?php

declare(strict_types=1);
require_once('data/DBConfig.php');
require_once('entities/Dvd.php');
require_once('entities/Film.php');

class DvdDAO {

    public function getAll():array{
        $dbh = new PDO(DBConfig::$DB_CONN,DBConfig::$DB_USER,DBConfig::$DB_PASSWORD);
        $sql ="SELECT dvdId, dvdNr , dvds.filmId, aanwezig, films.titel from dvds,films where films.filmId = dvds.filmId";
        $resultSet = $dbh->query($sql);
        $dvds = array();
        foreach($resultSet as $rij){
            $film = Film::create((int)$rij['filmId'],$rij['titel']);
            $dvd = new Dvd((int) $rij['dvdId'],(int) $rij['dvdNr'], (bool)$rij['aanwezig'] , $film );
            array_push($dvds , $dvd);
        }
        $dbh = null;
        return $dvds;
    }

    public function getByNumber( $nummer) :? Dvd{
        $dbh = new PDO(DBConfig::$DB_CONN,DBConfig::$DB_USER,DBConfig::$DB_PASSWORD);
        $sql = "select dvdId, dvdNr, dvds.filmId, aanwezig,  films.filmId, films.titel from dvds, films where films.filmId = dvds.filmId AND dvdNr = :nummer";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(":nummer"=>$nummer));
        $rij = $stmt->fetch(PDO::FETCH_ASSOC);
        if (!$rij){
            return null;
        }else{
            $film = Film::create((int)$rij['filmId'],$rij['titel']);
            $dvd = new Dvd((int)$rij['dvdId'],(int)$rij['dvdNr'], (bool)$rij['aanwezig'] , $film );
            $dbh = null;
            return $dvd;
        }
    }
    public function controleOpNummer($nummer){
        $dbh = new PDO(DBConfig::$DB_CONN,DBConfig::$DB_USER,DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("select * from dvds where dvdNr = :nummer");
        $stmt->execute(array(':nummer' => $nummer));
        $rowCount = $stmt->rowCount();
        $dbh = null;
        return $rowCount;
    }

    public function dvdMaken($NieuwDvdNr, $filmId){
        $dbh = new PDO(DBConfig::$DB_CONN,DBConfig::$DB_USER,DBConfig::$DB_PASSWORD);
        $sql = "insert into dvds (dvdNr, filmId, aanwezig) values (:NieuwDvdNr,:filmId, true)";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(":NieuwDvdNr" => $NieuwDvdNr, ":filmId" =>$filmId));
        $dvdId = $dbh->lastInsertId();
        $dbh = null;
  
    }
    public function aanwezigheid($dvdNr, $status){
        $dbh = new PDO(DBConfig::$DB_CONN,DBConfig::$DB_USER,DBConfig::$DB_PASSWORD);
        $sql = "update dvds set aanwezig = :status where dvdnr = :dvdNr";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(":dvdNr" => $dvdNr, ":status" =>$status));
        $dbh = null;
    }

    public function verwijderen($nummer){
        $dbh = new PDO(DBConfig::$DB_CONN,DBConfig::$DB_USER,DBConfig::$DB_PASSWORD);
        $sql = "delete from dvds where dvdNr = :nummer ";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(":nummer" => $nummer));
        $dbh = null;
    }


}