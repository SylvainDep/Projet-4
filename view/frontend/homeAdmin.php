<?php $title = 'Administration du site'; ?>

<?php ob_start(); ?>
<a id="contentaction" href="index.php?action=newpost">Ajouter nouvel article</a>
<p>Dernières publications :</p>
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
            <?= nl2br(htmlspecialchars(substr(strip_tags(html_entity_decode($data['content'])), 0, 500) . '...')) ?>
            <br />
            <em><a href="index.php?action=editpost&amp;id=<?= $data['id'] ?>"><i class="fas fa-edit"></i> Editer cet article</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>

<h2>Commentaires signalés</h2>

<?php
while ($comment = $alerts->fetch())
{
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= nl2br(htmlspecialchars($comment['comment'])) ?></p>
    <a id="checkbutton" href="index.php?action=checkcomment&amp;commentid=<?= $comment['id'] ?>">Valider le commentaire</a>
    <a id="deletebutton" href="index.php?action=deletecomment&amp;id=<?= $comment['id'] ?>">Supprimer le commentaire</a>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/adminheader.php'); ?>
<?php require('template.php'); ?>
