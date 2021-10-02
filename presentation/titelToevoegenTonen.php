<?php
declare(strict_types=1);
require_once('presentation/header.php');

?>


    <h1>Titel toevoegen</h1>
    <form action="titelToevoegen.php" method="post">
        <input type="text" name="nieuweTitel" >
        <input type="submit" name="titelToevoegen" value='titel toevoegen'>
    </form>
</body>
</html>