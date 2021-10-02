<?php
declare(strict_types=1);
require_once('business/DvdService.php');
$error = "";
if(isset($_POST["zoeken"])){ 
    if(!empty($_POST["dvdNr"])){
        $zoekDvdNr = $_POST['dvdNr'];
        $dvdService = new DvdService();
        $zoekResultaat = $dvdService->zoekOpDvdNr($zoekDvdNr);
         if(!$zoekResultaat){
            $error = "Geen dvd gevonden met dit nummer!";
         }
    }else{
        $error ="Geen nummer ingevuld";
    }
}
include('presentation/zoekresultaat.php');