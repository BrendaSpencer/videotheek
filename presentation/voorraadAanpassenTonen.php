<?php

declare(strict_types=1);
require_once('presentation/header.php');

?>


<h1>Status van een dvd aanpassen</h1>

<form action="voorraadAanpassen.php" method="post">
vul het nr van de dvd in aub:    <input type="number" name="dvdNr">
    <input type="submit" name="inVerhuur" value="verhuurd">
    <input type="submit" name="uitVerhuur" value="in stock">
    <?php
    if(isset($error)){
        print($error);
    }
    ?>
</form>
    
</body>
</html>