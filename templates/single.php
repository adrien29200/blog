<?php $this->title = 'Article'; ?>
<h1 class="fond-h1">Billet simple pour l'Alaska</h1>

<div class="container text-center article">
    <h2><?= htmlspecialchars($article->getTitle());?></h2>
    <p><?= htmlspecialchars($article->getContent());?></p>
    <p><?= htmlspecialchars($article->getAuthor());?></p>
    <p>Créé le : <?= htmlspecialchars($article->getCreatedAt());?></p>
</div>
<br>
<a class="btnColor btn text-light ml-3" href="home">Retour à l'accueil</a>
<div id="comments">
    <div class="addComment comment mt-3 col-md-4 col-sm-8">
        <h3 class="text-center">Ajouter un commentaire</h3>
        <?php include('form_comment.php'); ?>
    </div>
    <h3 class="ml-3 mt-3">Commentaires</h3>
    <?php
    foreach ($comments as $comment)
    {
        ?>
        <div class="comment col-md-4 col-sm-8 col-xs-11 mt-3 mb-3">
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
                <p><a class="btn btn-outline-danger btn-sm" href="flagComment&commentId=<?= $comment->getId(); ?>">Signaler le commentaire</a></p>
                <?php
            }
            ?>
        </div>
        <?php
    }
    ?>
</div>