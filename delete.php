<?php
    require_once('includes/header.php');
    require_once('connect.php');
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $sql = 'select * from films where id=' .$id;
    $query = $db->prepare($sql);
    $query->execute();
    $film = $query->fetch();
?>
<main class='container'>
    <article class='row'>
        <section class='col-12'>
            <br /><h3>Supprimer Film : </h3><br />
            <table class='table border border-1 table-striped'>
                <tr>
                    <th>ID</th><td><?=$film['id']; ?></td>
                </tr>
                <tr>
                    <th>Titre</th><td><?=$film['titre']; ?></td>
                </tr>
                <tr>
                    <th>Date sortie</th><td><?=$film['date_sortie']; ?></td>
                </tr>
                <tr>
                    <th>Genre</th><td><?=$film['genre']; ?></td>
                </tr>
                <tr>
                    <th>Duree</th><td><?=$film['duree']; ?></td>
                </tr>
                <tr>
                    <th>Note</th><td><?=$film['note']; ?></td>
                </tr>
            </table>
            <a href='remove.php?id=<?=$film['id'] ?>' class='btn btn-danger'>Supprimer</a>
            <a href='index.php' class='btn btn-primary'>Retour à la liste</a>
        </section>
    </article>
</main>
<?php
    require_once('disconnect.php');
    require_once('includes/footer.php');
?>