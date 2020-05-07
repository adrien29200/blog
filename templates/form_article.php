<?php
$route = isset($post) && $post->get('id') ? 'editArticle&articleId='.$post->get('id') : 'addArticle';
$submit = $route === 'addArticle' ? 'Envoyer' : 'Mettre à jour';
?>

<form class="text-center" method="post" action="<?= $route; ?>">
    <label for="title">Titre</label><br>
    <input class="rounded-sm" type="text" id="title" name="title" value="<?= isset($post) ? htmlspecialchars($post->get('title')): ''; ?>"><br>
    <?= isset($errors['title']) ? $errors['title'] : ''; ?>
    <label for="content">Contenu</label><br>
    <textarea class="text-body col-md-11 col-sm-8 rounded-sm bg-white" id="newText" name="content"><?= isset($post) ? htmlspecialchars($post->get('content')): ''; ?></textarea><br>
    <?= isset($errors['content']) ? $errors['content'] : ''; ?>
    <input class="btnColor btn text-light mt-2" type="submit" value="<?= $submit; ?>" id="submit" name="submit">
</form>
