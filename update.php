<?php
    $id = isset($_POST['txtid']) ? $_POST['txtid'] : '';
    $titre = isset($_POST['txttitre']) ? $_POST['txttitre'] : '';
    $annee = isset($_POST['txtannee']) ? $_POST['txtannee'] : '';
    $genre = isset($_POST['txtgenre']) ? $_POST['txtgenre'] : '';
    $duree = isset($_POST['txtduree']) ? $_POST['txtduree'] : '';
    $note = isset($_POST['txtnote']) ? $_POST['txtnote'] : '';
    require_once('connect.php');
    $sql = "update films set titre='" .$titre. "', date_sortie=" .intval($annee). ", genre='" .$genre. "', duree=" .intval($duree). ", note=" .intval($note). " where id=" .intval($id);
    $query = $db->prepare($sql);
    $query->execute();
    require_once('disconnect.php');
    header('location:index.php');
?>