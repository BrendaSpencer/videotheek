<?php

declare(strict_types=1);
require_once('data/DBConfig.php');
require_once('entities/Film.php');

class FilmDAO{
    public function getAll():?array{
        $dbh = new PDO(DBConfig::$DB_CONN,DBConfig::$DB_USER,DBConfig::$DB_PASSWORD);
        $sql = "select filmId, titel from films order by titel";
        $resultSet = $dbh->query($sql);
        $films = array();
        foreach($resultSet as $rij){
            $film = Film::create((int) $rij['filmId'], $rij['titel']);
            array_push($films,$film);
        }
        $dbh = null;
        return $films;
    }

    public function controleOpTitel($titel){
        $dbh = new PDO(DBConfig::$DB_CONN,DBConfig::$DB_USER,DBConfig::$DB_PASSWORD);
        $stmt = $dbh->prepare("select * from films where titel = :titel");
        $stmt->execute(array(':titel' => $titel));
        $rowCount = $stmt->rowCount();
        $dbh = null;
        return $rowCount;
    }

    public function voegFilmToe($titel):?Film{
        $dbh = new PDO(DBConfig::$DB_CONN,DBConfig::$DB_USER,DBConfig::$DB_PASSWORD);
        $sql = "insert into films(titel) values(:titel) ";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(":titel" =>$titel));
        $filmId = $dbh->lastInsertId();
        $dbh = null;
        $film = Film::create((int)$filmId, $titel);
        return $film;
    }

    public function getFilmById($filmId):?Film{
        $dbh = new PDO(DBConfig::$DB_CONN,DBConfig::$DB_USER,DBConfig::$DB_PASSWORD);
        $sql = "select titel from films where filmId = :filmId ";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(":filmId" =>$filmId));
        $titel = $stmt->fetch(PDO::FETCH_ASSOC);
        $dbh = null;
        $film = Film::create((int)$filmId, $titel);
        return $film;
    }

    public function filmVerwijderen($filmId){
        try{
        $dbh = new PDO(DBConfig::$DB_CONN,DBConfig::$DB_USER,DBConfig::$DB_PASSWORD);
        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $dbh->beginTransaction();
        $sql = "delete from films where filmId = :filmId";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(":filmId" => $filmId));

        $sql = "delete from dvds where filmId = :filmId";
        $stmt = $dbh->prepare($sql);
        $stmt->execute(array(":filmId" => $filmId));

        $dbh->commit();


        $dbh = null;
        }
        catch(Exception $e){
            $error = $e->getMessage();
            echo $error;
            $dbh->rollBack();
        }
    }


}