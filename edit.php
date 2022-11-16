<?php
    require_once('includes/header.php');
    require_once('connect.php');
    $id = isset($_GET['id']) ? $_GET['id'] : '';
    $sql = 'select * from films where id=' .$id;
    $query = $db->prepare($sql);
    $query->execute();
    $film = $query->fetch(PDO::FETCH_ASSOC);
?>
<main class='container'>
    <article class='row'>
        <section class='col-12'>
            <br /><h3>Modifier film : </h3><br />
            <form action='update.php' method='POST'>
                <input type="hidden" name="txtid" value="<?=$film['id'] ?>" />
                <div class="form-group">
                    <label for="txttitre">Titre : </label>
                    <input type="text" class="form-control" name="txttitre" id="txttitre" value="<?=$film['titre'] ?>" />
                </div>
                <div class="form-group">
                    <label for="txtannee">Date sortie : </label>
                    <input type="text" class="form-control" name="txtannee" id="txtannee" value="<?=$film['date_sortie'] ?>" />
                </div>
                <div class="form-group">
                    <label for="txtgenre">Genre : </label>
                    <input type="text" class="form-control" name="txtgenre" id="txtgenre" value="<?=$film['genre'] ?>" />
                </div>
                <div class="form-group">
                    <label for="txtduree">Duree : </label>
                    <input type="text" class="form-control" name="txtduree" id="txtduree" value="<?=$film['duree'] ?>" />
                </div>
                <div class="form-group">
                    <label for="txtnote">Note : </label>
                    <input type="text" class="form-control" name="txtnote" id="txtnote" value="<?=$film['note'] ?>" />
                </div>
                <br />
                <input type="submit" value="Enregistrer" class='btn btn-primary' />
                <a href='index.php' class='btn btn-info'>Retour à la liste</a>
            </form>
        </section>
    </article>
</main>
<?php
    require_once('disconnect.php');
    require_once('includes/footer.php');
?>