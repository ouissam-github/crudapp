<?php
    require_once('includes/header.php');
    require_once('connect.php');
    $sql = 'select distinct date_sortie from films order by date_sortie desc';
    $query = $db->prepare($sql);
    $query->execute();
    $annees = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<script>
    function $(selector) {
        return document.querySelector(selector);
    }
    function createCookie(name, value, days) {
    var expires;
        if (days) {
            var date = new Date();
            date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000));
            expires = "; expires=" + date.toGMTString();
        }
        else {
            expires = "";
        }
        document.cookie = escape(name) + "=" + escape(value) + expires + "; path=/";
    }
    function eraseCookie(c_name) {
        createCookie(c_name,"",-1);
    }
    function load_new_content(){
        eraseCookie("annee");
        var selected_option_value = $("#ddlyear").options[$("#ddlyear").selectedIndex].value;
        createCookie("annee", selected_option_value, "10");
        window.location = 'test.php';
    }
</script>
<?php
    $value = isset($_COOKIE['annee']) ? $_COOKIE['annee'] : '';
    $sql = 'select * from films where date_sortie = ' .intval($value);
    $query = $db->prepare($sql);
    $query->execute();
    $films = $query->fetchAll(PDO::FETCH_ASSOC);
?>
<main class='container'>
    <article class='row'>
        <section class='offset-10 col-2'>
            <br />
            <select id='ddlyear' class="form-select w-3" aria-label="Default select example" onchange='load_new_content();'>
                <option value='-1'>--- Annee ---</option>
            <?php
                foreach ($annees as $annee) {
                    if ($value == $annee['date_sortie']) {
            ?>
            <option value="<?=$annee['date_sortie'] ?>" selected><?=$annee['date_sortie'] ?></option>
            <?php
                    }
                    else {
            ?>
            <option value="<?=$annee['date_sortie'] ?>"><?=$annee['date_sortie'] ?></option>
            <?php
                    }
                }
            ?>
            </select>
        </section>
    </article>
    <article class='row'>
        <section class='col-12'>
            <table class='table'>
                <thead>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Date Sortie</th>
                    <th>Genre</th>
                    <th>Duree</th>
                    <th>Note</th>
                </thead>
                <tbody>
                <?php
                    foreach ($films as $film) {
                ?>
                    <tr><td><?=$film['id'] ?><td><?=$film['titre'] ?><td><?=$film['date_sortie'] ?><td><?=$film['genre'] ?><td><?=$film['duree'] ?><td><?=$film['note'] ?><td></tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </section>
    </article>
</main>

<?php
    require_once('disconnect.php');
    require_once('includes/footer.php');
?>