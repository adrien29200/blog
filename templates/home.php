<?php $this->title = 'Accueil'; ?>

<header class="container-fluid text-center mb-5">
    <div id="titre-principale">
        <h1>Billet simple pour l'Alaska</h1>
        <p>Roman de Jean Forteroche publié épisode par épisode</p>
    </div>
</header>

<div class="container text-center">
    <?= $this->session->show('add_comment'); ?>
    <?= $this->session->show('flag_comment'); ?>
    <?= $this->session->show('logout'); ?>

    <?php
    foreach ($articles as $article)
    {
        ?>
        <div class="article">
            <h2><?= htmlspecialchars($article->getTitle());?></h2>
            <p><?= htmlspecialchars($article->getContent());?></p>
            <p><a class="btn btn-light font-weight-bold" href="article&articleId=<?= htmlspecialchars($article->getId());?>">Lire la suite...</a></p>
            <p><?= htmlspecialchars($article->getAuthor());?></p>
            <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
            <p>Nombre de commentaires : <?= htmlspecialchars($article->getNumberOfComments($article->getId())) ?></p>
        </div>
        <br>
        <?php
    }
    ?>
</div>

<footer class="d-flex justify-content-between container-fluid bg-secondary pt-2 pb-2">
    <p>par Jean Forteroche</p>
    <a class="btn text-light btnColor" href="login">Connexion</a>
</footer>