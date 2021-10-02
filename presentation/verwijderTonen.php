<?php
declare(strict_types=1);
require_once('presentation/header.php');

?>


    <h1>Een exemplaar verwijderen</h1>
    <h3>Maak een titel keuze:</h3>
    <form action="exemplaarVerwijderen.php" method="post">
    <select name="titelkeuze">
        <option value=''></option>
        <?php
   
        foreach($dvds as $dvd){
            ?>
            <option value="<?php print($dvd->getdvdNr()) ?>">
            <?php print($dvd->getFilm()->getTitel() . " " . $dvd->getDvdNr()); ?>
        </option>
        <?php
        }
        ?>
    </select>

    <input type="submit" name="exemplaarVerwijderen" value="exemplaar verwijderen">
    <?php
    if(isset($error)){
         print($error);
     }
      ?>
    </form>
    
    
</body>
</html>