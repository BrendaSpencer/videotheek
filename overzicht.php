<?php
declare(strict_types=1);
require_once('business/DvdService.php');
require_once('business/FilmService.php');

$filmsDAO = new FilmService();
$films = $filmsDAO->getAlle();
$dvdDAO = new DvdService();
$dvds = $dvdDAO->getAlle();

include("presentation/allesTonen.php");