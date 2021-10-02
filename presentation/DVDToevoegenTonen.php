<?php
declare(strict_types=1);
require_once('presentation/header.php');
?>


    <h1>Maak een titel keuze:</h1>
    <form action="DvdToevoegen.php" method="post">
    <select name="titelkeuze">
        <option value=''></option>
        <?php
        foreach($films as $film){
            ?>
            <option value="<?php print($film->getFilmId()); ?>">
            <?php print($film->getTitel()); ?>
        </option>
        <?php
        }
        ?>
    </select>
    <input type="number" name="nieuwDvdNr">
    <input type="submit" name="exemplaarToevoegen" value="exemplaar Toevoegen">
    <?php print($error); ?>
    </form>

</body>
</html>