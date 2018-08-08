<?php $title = 'Jean Forteroche - Billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<div id="general_intro">
    <img src="../../public/images/writer_portrait.png"/>
    <p>Après <i>Panique à Caracas</i>, découvrez en exclusivité le nouveau roman de Jean Forteroche.</p>
    <p>Du suspense, de l'action et de la bagarre, découvrez cette histoire publiée au rythme d'un chapitre par semaine. Tout commentaire sur l'évolution de l'intrigue et de l'écriture sera très apprécié !</p>
</div>

<hr>

<h2>Derniers billets :</h2>

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
