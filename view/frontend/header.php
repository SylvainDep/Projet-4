<?php ob_start(); ?>
<div class="content">
    <img src="../../public/images/logo.png">
    <div id="menu">
        <a href="index.php?action=login">Connexion</a>
        <a href="index.php">Liste des articles</a>
    </div>
</div>
<?php $header = ob_get_clean(); ?>