<?php ob_start(); ?>
<form id="texteditor" method="post" action="index.php?action=updatepost&amp;id=<?= $post['id'] ?>" >
    <label>Titre</label><br/>
    <input type="text" name="title" value="<?= $post['title'] ?>"/>
    <br/>
    <label>Contenu</label>
    <textarea id="blogbody" name="content"><?= $post['content'] ?></textarea>
    <br/>
    <input type="submit"/>
</form>
<a href="index.php?action=deletepost&amp;id=<?= $post['id'] ?>">Supprimer l'article</a>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/adminheader.php'); ?>
<?php require('template.php'); ?>