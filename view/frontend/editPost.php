<?php $title = 'Edition de l\'article - ' . htmlspecialchars($post['title']); ?>

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
<a id="deletebutton" href="index.php?action=deletepost&amp;id=<?= $post['id'] ?>">Supprimer l'article</a>

<?php
while ($comment = $comments->fetch())
{
    ?>
    <div class="commentblock">
        <div class="commententry">
            <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
            <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
        </div>
        <a id="deletebutton" href="index.php?action=deletepostcomment&amp;id=<?= $comment['id'] ?>&amp;postid=<?= $post['id'] ?>">Supprimer le commentaire</a>
    </div>
    <?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/adminheader.php'); ?>
<?php require('template.php'); ?>