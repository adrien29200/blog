<?php $this->title = 'Article admin'; ?>
<h1>Mon blog</h1>
<p>En construction</p>

<div>
    <h2><?= htmlspecialchars($article->getTitle());?></h2>
    <p><?= htmlspecialchars($article->getContent());?></p>
    <p><?= htmlspecialchars($article->getAuthor());?></p>
    <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
</div>
<br>
<div class="actions">
    <a href="editArticle&articleId=<?= $article->getId(); ?>">Modifier</a>
    <a href="deleteArticle&articleId=<?= $article->getId(); ?>">Supprimer</a>
</div>
<br>
<a href="administration">Retour à l'administration</a>
<div id="comments" class="text-left" style="margin-left: 50px">
    <div class="comment col-md-4 col-sm-8">
        <h3>Ajouter un commentaire</h3>
        <?php include('form_comment.php'); ?>
    </div>
    <h3 class="ml-6">Commentaires</h3>
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <h4><?= htmlspecialchars($comment->getPseudo());?></h4>
        <p><?= htmlspecialchars($comment->getContent());?></p>
        <p>Posté le <?= htmlspecialchars($comment->getCreatedAt());?></p>
        <?php
        if($comment->isFlag()) {
            ?>
            <p>Ce commentaire a déjà été signalé</p>
            <?php
        } else {
            ?>
            <?php
        }
        ?>
        <p><a href="deleteComment&commentId=<?= $comment->getId(); ?>&articleId=<?= $article->getId(); ?>">Supprimer le commentaire</a></p>
        <br>
        <?php
    }
    ?>
</div>