<?php
    require_once('includes/header.php');
?>
<main class='container'>
    <article class='row'>
        <section class='col-12'>
            <br /><h3>Nouveau film : </h3><br />
            <form action='save.php' method='GET'>
                <div class="form-group">
                    <label for="txttitre">Titre : </label>
                    <input type="text" class="form-control" name="txttitre" id="txttitre" placeholder="Saisir un titre" />
                </div>
                <div class="form-group">
                    <label for="txtannee">Date sortie : </label>
                    <input type="text" class="form-control" name="txtannee" id="txtannee" placeholder="Saisir date sortie" />
                </div>
                <div class="form-group">
                    <label for="txtgenre">Genre : </label>
                    <input type="text" class="form-control" name="txtgenre" id="txtgenre" placeholder="Saisir genre" />
                </div>
                <div class="form-group">
                    <label for="txtduree">Duree : </label>
                    <input type="text" class="form-control" name="txtduree" id="txtduree" placeholder="Saisir duree" />
                </div>
                <div class="form-group">
                    <label for="txtnote">Note : </label>
                    <input type="text" class="form-control" name="txtnote" id="txtnote" placeholder="Saisir note" />
                </div>
                <br />
                <input type="submit" value="Enregistrer" class='btn btn-primary' />
                <input type="reset" value="Effacer" class='btn btn-warning' />
                <a href='index.php' class='btn btn-info'>Retour à la liste</a>
            </form>
        </section>
    </article>
</main>
<?php
    require_once('includes/footer.php');
?>