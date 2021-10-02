<?php
declare(strict_types=1);
require_once('business/FilmService.php');
require_once('business/DvdService.php');


$filmService = new FilmService();
$films = $filmService->getAlle();

if(isset($_POST['verwijderfilm']) && !empty($_POST['titelkeuze'])){
        $filmId = $_POST['titelkeuze'];
        $filmService = new FilmService();
        $filmService->filmVerwijderen($filmId);
        header("location:overzicht.php");
        exit(0);

}

include('presentation/verwijderFilmTonen.php');