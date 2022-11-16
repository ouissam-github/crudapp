<?php
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    require_once('connect.php');
    $sql = "delete from films where id=" .intval($id);
    $query = $db->prepare($sql);
    $query->execute();
    require_once('disconnect.php');
    header('location:index.php');
?>