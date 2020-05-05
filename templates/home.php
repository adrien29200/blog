<?php $this->title = 'Accueil'; ?>

<h1>Billet simple pour l'Alaska</h1>
<p>Roman publié épisode par épisode</p>
<?= $this->session->show('add_comment'); ?>
<?= $this->session->show('flag_comment'); ?>
<?= $this->session->show('logout'); ?>

<a href="login">Connexion</a>

<?php
foreach ($articles as $article)
{
    ?>
    <div>
        <h2><a href="article&articleId=<?= htmlspecialchars($article->getId());?>"><?= htmlspecialchars($article->getTitle());?></a></h2>
        <p><?= htmlspecialchars($article->getContent());?></p>
        <p><?= htmlspecialchars($article->getAuthor());?></p>
        <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
        <p>Nombre de commentaires : <?= htmlspecialchars($article->getNumberOfComments($article->getId())) ?></p>
    </div>
    <br>
    <?php
}
?>