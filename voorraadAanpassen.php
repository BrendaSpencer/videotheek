<?php

declare(strict_types=1);
require_once("business/DvdService.php");

if(isset($_POST['inVerhuur']) || isset($_POST['uitVerhuur'])){
    if(!empty($_POST['dvdNr'])){
        $dvdNr = $_POST['dvdNr'];
        $dvdService = new DvdService();
        $resultaat = $dvdService->nrControle($dvdNr);
        if(!$resultaat){
            $error = "Onbekend nummer.";
            include('presentation/voorraadAanpassenTonen.php');
            exit(0);
         
        }
        if($_POST['inVerhuur']){
            $status = false;
        }else{
            $status = true;
        }
       
        $dvdService->wijzigStatus($dvdNr, $status);
        header("location:overzicht.php");
        exit(0);
    }else{
        $error = "Geen nummer ingevuld.";
    }


}




include('presentation/voorraadAanpassenTonen.php');