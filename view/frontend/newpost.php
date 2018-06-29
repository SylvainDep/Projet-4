<?php ob_start(); ?>
<form id="texteditor" method="post" action="index.php?action=addpost&amp;id=<?= $post['id'] ?>">
    <label>Titre</label><br/>
    <input type="text" name="title"/>
    <br/>
    <label>Contenu</label>
    <textarea id="blogbody" name="content" placeholder="C'était un matin de printemps..."></textarea>
    <br/>
    <input type="submit"/>
</form>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/adminheader.php'); ?>
<?php require('template.php'); ?>