<?php
    require_once('includes/header.php');
    require_once('connect.php');
    if (!empty($_POST)) {
        if (isset($_POST['email'], $_POST['pass']) && !empty($_POST['email']) && !empty($_POST['pass'])) {
            if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
                die("Ce n'est pas un email !");
            }
            $sql = "select * from accounts where email = :email";
            $query = $db->prepare($sql);
            $query->bindValue(":email", $_POST['email'], PDO::PARAM_STR);
            $query->execute();
            $user = $query->fetch(PDO::FETCH_ASSOC);
            if (!$user) {
                die("L'utilisateur et/ou le mot de passe est incorrect !");
            }
            if (!password_verify($_POST['pass'], $user['pass'])) {
                die("L'utilisateur et/ou le mot de passe est incorrect !");
            }
            session_start();
            $_SESSION['user'] = [
                'id' => $user['id'],
                'pseudo' => $user['username'],
                'email' => $user['email'],
                'roles' => $user['roles']
            ];
            header('location: index.php');
        }
    }
?>
<main class='container'>
    <article class='row'>
        <section class='col-12'>
            <br /><h3>Authentification : </h3><br />
            <form method="post">
                <div class='form-group pb-3'>
                    <label for="email">E-mail : </label>
                    <input type="text" name="email" id="email" placeholder="Saisir votre email" class='form-control' />
                </div>
                <div class='form-group pb-3'>
                    <label for="pass">Mot de passe : </label>
                    <input type="password" name="pass" id="pass" placeholder="Saisir votre mot de passe" class='form-control' />
                </div>
                <button class='btn btn-primary' type="submit">Se connecter</button>
            </form>
        </section>
    </article>
</main>
<?php
    require_once('disconnect.php');
    require_once('includes/footer.php');
?>