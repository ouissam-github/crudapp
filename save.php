<?php
    $titre = isset($_GET['txttitre']) ? $_GET['txttitre'] : '';
    $annee = isset($_GET['txtannee']) ? $_GET['txtannee'] : '';
    $genre = isset($_GET['txtgenre']) ? $_GET['txtgenre'] : '';
    $duree = isset($_GET['txtduree']) ? $_GET['txtduree'] : '';
    $note = isset($_GET['txtnote']) ? $_GET['txtnote'] : '';
    require_once('connect.php');
    $sql = "insert into films (titre, date_sortie, genre, duree, note) values('" .$titre. "', " .intval($annee). ", '" .$genre. "', " .intval($duree). ", " .intval($note). ")";
    $query = $db->prepare($sql);
    $query->execute();
    require_once('disconnect.php');
    header('location:index.php');
?>