<?php

$fichier = "../../../../files/?dir=/Documents&fileid=10";
$total = 0;
$ressource = fopen ($fichier, "r");
$contenu = fread ($ressource, filesize ($fichier));
fclose ($ressource);
$tableau = explode("\r\n", $contenu);
$longueurs = array();
foreach($tableau as $ligne)
{
    $total = strlen($ligne)+$total;
}
$nb = count($tableau);
for($i = 0; $i < $nb; $i++)
{
?>

<?php
}
?>
<p>Le document contiens <?= $total ?> caractères</p>
