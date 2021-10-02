<?php
declare(strict_types=1);
require_once('presentation/header.php');


if(isset($zoekResultaat)){
    ?>

    <h1>Uw zoekkopdracht leverde volgend resultaat op.</h1>
    <table>
    <tr>
    <th>Titel</th>
    <th>Nummer(s)</th>
    <th>Exemplaren aanwezig</th>

</tr>

    <td><?php print($zoekResultaat->getFilm()->getTitel()); ?></td>
    <td><?php print($zoekResultaat->getDvdNr()); ?></td>
    <td><?php print($zoekResultaat->getAanwezig()); ?></td>
    <?php
}?>
</table>
    <form action="zoeken.php" method="post">
    <h2>Op dvd nummer zoeken:</h2>
    <?php
    if(isset($error)){
        print($error);
    }
    ?><br>
<input type="number" name="dvdNr">
<input type="submit" name="zoeken" value="zoeken">
</form>

</body>
</html>