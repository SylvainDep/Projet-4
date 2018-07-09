<?php $title = 'Connexion'; ?>

<?php ob_start(); ?>
<p><strong>Connexion</strong></p>
<form id="loginbox" method="post" action="index.php?action=homeadmin">
    <label for="pseudo">Pseudo</label>
    <input type="text" name="pseudo" />
    <br/><br/>
   <label for="password">Mot de passe</label>
   <input type="password" name="password" />
    <br/><br/>
   <input type="submit" value="Connexion">
</form>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/header.php'); ?>
<?php require('template.php'); ?>