<?php
declare(strict_types=1);
require_once('presentation/header.php');

?>

    <h1>Film verwijderen met alle bijhorende dvds</h1>
    <h3>maak uw keuze:</h3>

    <form action="verwijderFilm.php" method="post">
    <select name="titelkeuze">
        <option value=''></option>
        <?php
   
        foreach($films as $film){
            ?>
            <option value="<?php print($film->getfilmId()) ?>">
            <?php print($film->getTitel()); ?>
        </option>
        <?php
        }
        ?>
    </select>

    <input type="submit" name="verwijderfilm" value="exemplaren verwijderen">
    <?php
    if(isset($error)){
         print($error);
     }
      ?>
    </form>
    
</body>
</html>