<?php

$xml = new DOMDocument('1.0', 'UTF-8');

if (!file_exists('etudiants.xml')) {
    $file = fopen('etudiants.xml', 'w+');
    fclose($file);
}

$xml->load("etudiants.xml");

try {
    if (!isset($_POST['nom']) || !preg_match('/[a-z]{3,20}/', $_POST['nom']))
        throw new Exception("Nom invalide");

    if (!isset($_POST['prenom']) || !preg_match('/[a-z]{3,20}/', $_POST['prenom']))
        throw new Exception("Prénom invalide");

    // Ajout dans le fichier xml
    if (!$xml->documentElement) {
        $xml->appendChild($xml->createElement('etudiants'));
    }

    $student = $xml->createElement("etudiant");
    $student->appendChild($xml->createElement("nom", $_POST['nom']));
    $student->appendChild($xml->createElement("prenom", $_POST['prenom']));

    $xml->documentElement->appendChild($student);
    $xml->save('etudiants.xml');

    header("location: etudiants.xml");
} catch (Exception $ex) {
    echo $ex->getMessage();
}



