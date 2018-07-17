<?php ob_start(); ?>
<head>
    <script type="text/javascript" src="/public/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: '#blogbody',
            mode : "textareas",
            language : "fr_FR"
        });
    </script>
</head>
<a href="index.php?action=logout">Déconnexion</a>
<a href="index.php?action=homeadmin">Tableau de bord</a>
<?php $header = ob_get_clean(); ?>