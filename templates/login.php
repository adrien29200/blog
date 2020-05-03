<?php $this->title = "Connexion"; ?>
<h1>Mon blog</h1>
<p>En construction</p>
<?= $this->session->show('error_login'); ?>
<div>
    <form method="post" action="administration">
        <label for="pseudo">Pseudo</label><br>
        <input type="text" id="pseudo" name="pseudo"><br>
        <label for="password">Mot de passe</label><br>
        <input type="password" id="password" name="password"><br>
        <input type="submit" value="Connexion" id="submit" name="submit">
    </form>
    <a href="home">Retour à l'accueil</a>
</div>