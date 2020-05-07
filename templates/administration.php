<?php $this->title = 'Administration'; ?>

<h1 class="fond-h1">Administration</h1>
<div>
    <?= $this->session->show('add_article'); ?>
    <?= $this->session->show('edit_article'); ?>
    <?= $this->session->show('delete_article'); ?>
    <?= $this->session->show('unflag_comment'); ?>
    <?= $this->session->show('delete_comment'); ?>
    <?= $this->session->show('login'). ' ' . $this->session->show('pseudo'); ?>
</div>

<a class="btn text-light btnColor mt-3 ml-3" href="logout">Déconnexion</a>

<h2 class="text-center rounded h2Admin p-2 mb-5">Articles</h2>
<a class="btn text-light btnColor mb-3 ml-3" href="addArticle">Nouvel article</a>
<table class="table table-dark table-striped table-responsive">
    <tr>
        <td scope="col">Titre</td>
        <td scope="col">Contenu</td>
        <td scope="col">Date</td>
        <td scope="col">Actions</td>
    </tr>
    <?php
    foreach ($articles as $article)
    {
        ?>
        <tr>
            <td scope="row"><?= htmlspecialchars($article->getTitle());?></td>
            <td scope="row"><?= substr(htmlspecialchars($article->getContent()), 0, 100);?></td>
            <td scope="row">Créé le : <?= htmlspecialchars($article->getCreatedAt());?></td>
            <td scope="row">
                <a href="editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
                <a href="deleteArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
                <a href="articleAdmin&articleId=<?= htmlspecialchars($article->getId()); ?>">Voir</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>

<h2 class="text-center rounded h2Admin p-2 mb-5">Commentaires signalés</h2>
<table class="table table-dark table-striped table-responsive">
    <tr>
        <td>Pseudo</td>
        <td>Message</td>
        <td>Date</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($comment->getPseudo());?></td>
            <td><?= substr(htmlspecialchars($comment->getContent()), 0, 150);?></td>
            <td>Créé le : <?= htmlspecialchars($comment->getCreatedAt());?></td>
            <td>
                <a href="unflagComment&commentId=<?= $comment->getId(); ?>">Désignaler le commentaire</a></br>
                <a href="deleteComment&commentId=<?= $comment->getId(); ?>">Supprimer le commentaire</a></br>
                <a href="articleAdmin&articleId=<?= $comment->getArticleId(); ?>">Voir le contexte</a>
            </td>
        </tr>
        <?php
    }
    ?>
</table>
