<?php
    $host = '127.0.0.1';
    $dbname = 'critiquefilm';
    $user = 'root';
    $pass = 'password';

    $dsn = 'mysql:host=' .$host. ';dbname=' .$dbname;
    $db = null;
    try {
        $db = new PDO($dsn, $user, $pass);
        $db->exec('set names utf8');
    }
    catch(PDOException $e) {
        echo 'Erreur : ' .$e->getMessage(). '<br />';
        die();
    }
?>