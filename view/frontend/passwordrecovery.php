<?php $title = 'Récupération de mot de passe'; ?>

<?php ob_start(); ?>
    <p><strong>Récupération du mot de passe</strong></p>
    <form id="passwordresend" method="post" action="index.php?action=recoverpassword">
        <label for="pseudo">Votre compte mail</label>
        <br/>
        <input type="text" name="loginmail" />
        <br/>
        <input type="submit" value="Récupérer mot de passe">
    </form>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/header.php'); ?>
<?php require('template.php'); ?>