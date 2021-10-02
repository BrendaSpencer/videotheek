<?php
declare(strict_types=1);
require_once('business/DvdService.php');

$dvdDAO = new DvdService();
$dvds = $dvdDAO->getAlle();

if(isset($_POST['exemplaarVerwijderen']) && !empty($_POST['titelkeuze'])){
    $nummer = $_POST['titelkeuze'];
    $dvdDAO->verwijderDvd($nummer);
    header("location:overzicht.php");

}else{
    $error = "Geen dvd aangeduid.";
}

include('presentation/verwijderTonen.php');