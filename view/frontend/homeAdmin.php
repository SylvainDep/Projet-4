<?php ob_start(); ?>
<h1>Mon super blog !</h1>
<p>Derniers billets du blog :</p>
<p><a href="index.php?action=addpost">Ajouter nouvel article</a></p>
<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <?= htmlspecialchars($data['title']) ?>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars(substr($data['content'], 0, 100) . '...')) ?>
            <br />
            <em><a href="index.php?action=editpost&amp;id=<?= $data['id'] ?>">Editer cet article.</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>

<?php
while ($comment = $alerts->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <a href="index.php?action=checkcomment&amp;postid=<?= $post['id'] ?>&amp;commentid=<?= $comment['id'] ?>">Valider ce commentaire.</a>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
