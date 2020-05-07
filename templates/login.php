<?php $this->title = "Connexion"; ?>
<h1 class="fond-h1">Connexion à l'administration</h1>
<?= $this->session->show('error_login'); ?>
<div class="container text-center">
    <form method="post" action="login">
        <label for="pseudo">Pseudo</label><br>
        <input class="rounded-sm" type="text" id="pseudo" name="pseudo"><br>
        <label for="password">Mot de passe</label><br>
        <input class="rounded-sm" type="password" id="password" name="password"><br>
        <input class="btn text-light btnColor mt-3" type="submit" value="Connexion" id="submit" name="submit">
    </form>
    <a class="btn text-light btnColor mt-3" href="home">Retour à l'accueil</a>
</div>