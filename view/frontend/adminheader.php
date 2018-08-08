<?php ob_start(); ?>
    <div class="content">
        <img src="../../public/images/logo.png">
        <div id="menu">
            <a href="index.php?action=logout">Déconnexion</a>
            <a href="index.php?action=homeadmin">Tableau de bord</a>
            <a href="index.php?action=listPosts">Vue publique</a>
        </div>
    </div>
<?php $header = ob_get_clean(); ?>