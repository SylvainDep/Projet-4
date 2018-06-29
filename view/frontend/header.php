<?php ob_start(); ?>
<head>
    <script src='https://cloud.tinymce.com/stable/tinymce.min.js'></script>
    <script>
        tinymce.init({
            selector: '#blogbody'
        });
    </script>
</head>
<a href="index.php?action=login">Connexion</a>
<a href="index.php">Revenir aux articles</a>
<?php $header = ob_get_clean(); ?>