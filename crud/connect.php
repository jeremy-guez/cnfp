<?php
// essaie de connection a la base
try {
    // connexion a la base
    $db = new PDO('mysql:host=localhost;dbname=cnfpinside', 'root','');
    $db->exec('SET NAMES "UTF8"');
} catch (PDOException $e) {
    echo 'Erreur : '. $e->getMessage();
    die();
}