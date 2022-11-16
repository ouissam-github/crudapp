<?php
    require_once('includes/header.php');
    require_once('connect.php');
    if (!empty($_POST)) {
        if (isset($_POST['pseudo'], $_POST['email'], $_POST['pass']) && !empty($_POST['pseudo']) && !empty($_POST['email']) && !empty($_POST['pass'])) {
            $pseudo = strip_tags($_POST['pseudo']);
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                die("<div class='ps-5 pt-2'><h3>Adresse email incorrecte</h3></div>");
            }
            $pass = password_hash($_POST['pass'], PASSWORD_ARGON2ID);
            $sql = "insert into accounts (username, email, pass, roles) values (:pseudo, :email, '$pass', '[\"ROLE_USER\"]')";
            $query = $db->prepare($sql);
            $query->bindValue(":pseudo", $pseudo, PDO::PARAM_STR);
            $query->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
            $query->execute();
            $id = $db->lastInsertId();
        }
        else {
            die("<div class='ps-5 pt-2'><h3>Le formulaire est incomplet</h3></div>");
        }
    }
?>
<main class='container'>
    <article class='row'>
        <section class='col-12'>
            <br /><h3>Inscription : </h3><br />
            <form method="post">
<!--                 <div class='form-group pb-3'>
                    <label for="select">Section : </label>
                    <select id='select' class='form-control' onchange='location = this.value'>
                        <option>--- Selectionner ---</option>
                        <option value='add.php?name=5'>Ajouter</option>
                        <option value='update.php'>Modifier</option>
                        <option value='delete.php'>Supprimer</option>
                    </select>
                </div> -->
                <div class='form-group pb-3'>
                    <label for="pseudo">Compte : </label>
                    <input type="text" name="pseudo" id="pseudo" placeholder="Saisir votre pseudo" class='form-control' />
                </div>
                <div class='form-group pb-3'>
                    <label for="email">E-mail : </label>
                    <input type="email" name="email" id="email" placeholder="Saisir votre email" class='form-control' />
                </div>
                <div class='form-group pb-3'>
                    <label for="pass">Mot de passe : </label>
                    <input type="password" name="pass" id="pass" placeholder="Saisir votre mot de passe" class='form-control' />
                </div>
                <button class='btn btn-primary' type="submit">S'inscrire</button>
            </form>
        </section>
    </article>
</main>
<?php
    require_once('disconnect.php');
    require_once('includes/footer.php');
?>