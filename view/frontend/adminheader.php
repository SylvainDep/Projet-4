<?php ob_start(); ?>
<a href="index.php?action=logout">Déconnexion</a>
<a href="index.php?action=homeadmin">Tableau de bord</a>
<a href="index.php?action=listPosts">Vue publique</a>
<?php $header = ob_get_clean(); ?>