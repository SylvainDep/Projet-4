<?php
require_once 'vendor/htmlpurifier/library/HTMLPurifier.auto.php';

$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);

$post['title'] = $purifier->purify($post['title']);
$post['content'] = $purifier->purify($post['content']);

?>

<?php $title = 'Edition de l\'article - ' . $post['title']; ?>

<?php ob_start(); ?>
<?php
if(!empty($_GET['origin']) && $_GET['origin'] == 'deletecomment') {
    echo '<p id="confirmationmodalcontainer">Le commentaire a bien été supprimé</p>';
} elseif(!empty($_GET['origin']) && $_GET['origin'] == 'editedpost') {
    echo '<p id="confirmationmodalcontainer">La modification de l\'article a bien été prise en compte</p>';
} elseif (!empty($_GET['origin']) && $_GET['origin'] == 'publishedpost') {
    echo '<p id="confirmationmodalcontainer">L\'article est maintenant en ligne</p>';
} elseif (!empty($_GET['origin']) && $_GET['origin'] == 'unpublishedpost') {
    echo '<p id="confirmationmodalcontainer">L\'article est maintenant hors ligne</p>';
}
?>

<h2>Éditer article</h2>

<form id="texteditor" method="post" action="index.php?action=updatepost&amp;id=<?= $post['id'] ?>" >
    <label>Titre</label><br/>
    <input type="text" name="title" value="<?= $post['title'] ?>"/>
    <br/>
    <label>Contenu</label>
    <textarea id="blogbody" name="content"><?= $post['content'] ?></textarea>
    <br/>
    <input type="submit"/>
</form>

<div id="deletepostcontainer">
    <button id="first_step_deletecomment" onclick="document.getElementById('first_step_deletecomment').style.display='none'">Supprimer l'article</button>
    <a id="deletebutton" href="index.php?action=deletepost&amp;id=<?= $post['id'] ?>">Confirmer</a>
</div>

<?php if($post['published'] == 0) { ?>
    <a id="publishbutton" href="index.php?action=publishpost&amp;id=<?= $post['id'] ?>">Publier</a>
<?php } else { ?>
    <a id="unpublishbutton" href="index.php?action=unpublishpost&amp;id=<?= $post['id'] ?>">Retirer</a>
<?php }
?>

<?php
while ($comment = $comments->fetch())
{
    $comment['comment'] = $purifier->purify($comment['comment']);
    $comment['author'] = $purifier->purify($comment['author']);
    ?>
    <div class="commentblock">
        <div class="commententry">
            <p><strong><?= $comment['author'] ?></strong> le <?= $comment['comment_date_fr'] ?></p>
            <p><?= $comment['comment'] ?></p>
        </div>
        <div class="deletecontainer">
            <button  class="first_step_deletecomment" id="<?= $comment['id'] ?>" onclick="document.getElementById('<?= $comment['id'] ?>').style.display='none'">Supprimer</button>
            <a id="deletebutton" href="index.php?action=deletepostcomment&amp;id=<?= $comment['id'] ?>&postid=<?= $post['id'] ?>">Confirmer</a>
        </div>
    </div>
    <?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/adminheader.php'); ?>
<?php require('template.php'); ?>