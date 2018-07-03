<?php $title = 'Jean Forteroche - Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<h2>Dernières publications</h2>


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
            <br/>
            <em><a href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire la suite</a></em>
        </p>
    </div>
<?php
}
$posts->closeCursor();
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/header.php'); ?>
<?php require('template.php'); ?>
