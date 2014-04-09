<?php

$etudiants;

try {
    if(!file_exists('etudiants.xml'))
        throw new Exception ("Le fichier etudiants.xml n'existe pas");
    
    $xml = new DOMDocument();
    $xml->load('etudiants.xml');
    
    $etudiants = $xml->getElementsByTagName('etudiant');
    
} catch (Exception $ex) {
    echo $ex->getMessage();
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Liste des étudiants</title>

        <!-- Bootstrap -->
        <link href="js/libs/twitter-bootstrap/css/bootstrap.css" rel="stylesheet">
    </head>
    <body>
        <table class="table table-bordered">
            <tr>
                <td>Nom</td>
                <td>Prénom</td>
            </tr>
            <?php foreach ($etudiants as $etudiant) :?>
            <tr>
                <td><?php echo $etudiant->getElementsByTagName('nom')->item(0)->nodeValue;?></td>
                <td><?php echo $etudiant->getElementsByTagName('prenom')->item(0)->nodeValue;?></td>
            </tr>
            <?php endforeach;?>
        </table>
    </body>
</html>