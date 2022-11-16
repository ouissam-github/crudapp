    <?php
        require_once('includes/header.php');
        require_once('connect.php');
        $key = isset($_REQUEST['key']) ? $_REQUEST['key'] : '';
        $sql = "select count(*) as cpt from films where titre like '%$key%'";
        $query = $db->prepare($sql);
        $query->execute();
        $count = $query->fetch(PDO::FETCH_ASSOC);
        $page = isset($_GET['page']) ? intval($_GET['page']) : 1;
        $nb_per_list = 5;
        $pages = ceil($count['cpt'] / $nb_per_list);
        $debut = ($page - 1) * $nb_per_list;
        $sql = "select * from films where titre like '%$key%' limit $debut, $nb_per_list";
        $query = $db->prepare($sql);
        $query->execute();
        $films = $query->fetchAll(PDO::FETCH_ASSOC);
    ?>
    <main class='container'>
        <br />
        <article class='row'>
            <section class='col-12'>
                <form action="index.php" method="post">
                    <div class='row'>
                        <div class='offset-5 col-2'>
                            <label>Chercher par titre : </label>
                        </div>
                        <div class='col-3'>
                            <input type="text" class='form-control' name="key" id="key" />
                        </div>
                        <div class='col-2'>
                            <button class='btn btn-primary' type="submit">
                                <i class="bi bi-search"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </section>
        </article>
        <article class='row'>
            <section class='col-12'>
                <br />
                <a class='btn btn-primary' href='add.php'>
                    <i class="bi bi-plus-circle"></i>&nbsp;Ajouter >> Film
                </a><br /><br />
                <table class='table'>
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Titre</th>
                            <th>Date sortie</th>
                            <th>Genre</th>
                            <th>Duree</th>
                            <th>Note</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
    <?php
                    foreach($films as $film) {
    ?>
                        <tr>
                            <td><?=$film['id'] ?></td>
                            <td><?=$film['titre'] ?></td>
                            <td><?=$film['date_sortie'] ?></td>
                            <td><?=$film['genre'] ?></td>
                            <td><?=$film['duree'] ?></td>
                            <td><?=$film['note'] ?></td>
                            <td>
                                <a class='btn btn-success' href='detail.php?id=<?=$film['id'] ?>'>
                                <i class="bi bi-list"></i></a>&nbsp;|&nbsp;
                                <a class='btn btn-warning' href='edit.php?id=<?=$film['id'] ?>'>
                                <i class="bi bi-pencil"></i></a>&nbsp;|&nbsp;
                                <a class='btn btn-danger' href='delete.php?id=<?=$film['id'] ?>'>
                                <i class="bi bi-trash"></i></a></td>
                        </tr> 
    <?php
                    }
    ?>
                    </tbody>
                </table>
                <ul class='pagination'>
                    <?php
                        for ($i = 1; $i <= $pages; $i++) {
                            echo "<li class='page-item'><a class='page-link' href='?page=$i&key=$key'>$i</a></li>";
                        }
                    ?>
                </ul>
            </section>
        </article>
    </main>
    <?php
        require_once('disconnect.php');
        require_once('includes/footer.php');
    ?>
