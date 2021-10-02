<?php

declare(strict_types=1);
require_once('business/FilmService.php');
require_once('business/DvdService.php');
$error = "";
$filmsDAO = new FilmService();
$films = $filmsDAO->getAlle();

if(isset($_POST['exemplaarToevoegen'])){
     if(!empty($_POST['nieuwDvdNr'])){
        $NieuwDvdNr = $_POST['nieuwDvdNr'];
        $dvdService = new DvdService();
        $resultaat = $dvdService->nrControle($NieuwDvdNr);
    if($resultaat){
        $error = "Het nummer bestaat al.";
    }elseif(!empty($_POST['titelkeuze'])){
       $filmId = $_POST['titelkeuze'];
       $dvdService->dvdToevoegen($filmId, $NieuwDvdNr);
       header("location:overzicht.php");
       exit(0);
    }else{
        $error = "Geen titel geselecteerd.";
    }
}else{
    $error = "Geen nummer ingevuld";
}
}

include('presentation/DVDToevoegenTonen.php');