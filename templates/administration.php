<?php $this->title = 'Administration'; ?>

<h1 class="fond-h1">Administration</h1>
<?= $this->session->show('add_article'); ?>
<?= $this->session->show('edit_article'); ?>
<?= $this->session->show('delete_article'); ?>
<?= $this->session->show('unflag_comment'); ?>
<?= $this->session->show('delete_comment'); ?>
<?= $this->session->show('login'). ' ' . $this->session->show('pseudo'); ?>

<a class="btn text-light btnColor mt-3 ml-3" href="logout">Déconnexion</a>

<h2 class="text-center rounded h2Admin p-2 mb-5">Articles</h2>
<a class="btn text-light btnColor mb-3 ml-3" href="addArticle">Nouvel article</a>
<table class="table table-dark">
    <tr>
        <td>Id</td>
        <td>Titre</td>
        <td>Contenu</td>
        <td>Auteur</td>
        <td>Date</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($articles as $article)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($article->getId());?></td>
            <td><?= htmlspecialchars($article->getTitle());?></td>
            <td><?= substr(htmlspecialchars($article->getContent()), 0, 150);?></td>
            <td><?= htmlspecialchars($article->getAuthor());?></td>
            <td>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></td>
            <td>
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
<table class="table table-dark">
    <tr>
        <td>Id</td>
        <td>Pseudo</td>
        <td>Message</td>
        <td>Date</td>
        <td>Id article</td>
        <td>Actions</td>
    </tr>
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <tr>
            <td><?= htmlspecialchars($comment->getId());?></td>
            <td><?= htmlspecialchars($comment->getPseudo());?></td>
            <td><?= substr(htmlspecialchars($comment->getContent()), 0, 150);?></td>
            <td>Créé le : <?= htmlspecialchars($comment->getCreatedAt());?></td>
            <td><?= htmlspecialchars($comment->getArticleId());?></td>
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
