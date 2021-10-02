<?php
declare(strict_types=1);
require_once('presentation/header.php');
?>


<h1>Een overzicht van alle films</h1>

<table>
    <tr>
    <th>Titel</th>
    <th>Nummer(s)</th>
    <th>Exemplaren aanwezig</th>

</tr>
<?php

foreach($films as $film){
    $aantal = 0;
    ?>
    <tr>
        <td><?php print($film->getTitel()); ?></td>
         <td><?php
         foreach($dvds as $dvd){
             if ($dvd->getFilm()== $film){
             
                 if($dvd->getAanwezig()==1){
                    $aantal++;
                     print("  ". "<span style='font-weight:bold;'>".
                     $dvd->getdvdNr(). "  " . "</span>");
                 }else{
                     print("  ".$dvd->getdvdNr(). "  ");
                 }
             }
        } ?></td> 
        <td><?php print($aantal)?></td>
    </tr>
    <?php
}
?>
</table>

    <?php
    if(isset($error)){
        print($error);
    }
    ?><br>

    
</body>
</html>