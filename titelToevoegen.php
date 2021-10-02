<?php

declare(strict_types=1);
require_once('business/FilmService.php');

if(isset($_POST['titelToevoegen'])){
     if(!empty($_POST['nieuweTitel'])){
        $nieuweTitel = $_POST['nieuweTitel'];
        $filmService = new FilmService();
        $resultaat = $filmService->titelControle($nieuweTitel);
        print($resultaat);
        header("location:overzicht.php");
     }else{
         print('Niet Goed');
     }
}else{
    include_once('presentation/titelToevoegenTonen.php');
}
?>

