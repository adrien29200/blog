<?php $this->title = 'Accueil'; ?>

<h1>Mon blog</h1>
<p>En construction</p>
<?= $this->session->show('add_comment'); ?>
<?= $this->session->show('flag_comment'); ?>
<?= $this->session->show('logout'); ?>

<a href="login">Connexion</a>
<!-- href="../login -->

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