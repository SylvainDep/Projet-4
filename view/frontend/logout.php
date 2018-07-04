<?php $title = 'Déconnexion'; ?>

<?php ob_start(); ?>
<p>Vous êtes déconnecté de l'administration du site</p>
<a href="index.php">Revenir à l'accueil</a>
<a href="index.php?action=login">Connexion</a>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/header.php'); ?>
<?php require('template.php'); ?>