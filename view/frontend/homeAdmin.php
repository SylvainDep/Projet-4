<?php
require_once 'vendor/htmlpurifier/library/HTMLPurifier.auto.php';

$config = HTMLPurifier_Config::createDefault();
$purifier = new HTMLPurifier($config);

?>

<?php $title = 'Administration du site'; ?>

<?php ob_start(); ?>
<?php
if(!empty($_GET['origin']) && $_GET['origin'] == 'deletecomment') {
    echo '<p id="confirmationmodalcontainer">Le commentaire a bien été supprimé</p>';
} elseif (!empty($_GET['origin']) && $_GET['origin'] == 'checkcomment') {
    echo '<p id="confirmationmodalcontainer">Le commentaire a bien été validé</p>';
} elseif (!empty($_GET['origin']) && $_GET['origin'] == 'deletepost') {
    echo '<p id="confirmationmodalcontainer">L\'article a bien été supprimé</p>';
}
?>

<h2>Tableau d'administration</h2>

<a id="contentaction" href="index.php?action=newpost">Ajouter nouvel article</a>
<p>Derniers billets :</p>
<?php
while ($data = $posts->fetch())
{
    $data['title'] = $purifier->purify($data['title']);
    $data['content'] = $purifier->purify($data['content']);
?>
    <div class="news">
        <h3>
            <?= $data['title'] ?>
            <em>le <?= $data['creation_date_fr'] ?></em> -
            <?php if($data['published'] == 1) {
                echo 'PUBLIÉ';
            } else {
                echo '<span style="color: #D74940; background-color: white">HORS LIGNE</span>';
            } ?>
        </h3>


            <?= $data['content'] ?>
        <p><em><a href="index.php?action=editpost&amp;id=<?= $data['id'] ?>"><i class="fas fa-edit"></i> Editer cet article</a></em></p>
    </div>
<?php
}
$posts->closeCursor();
?>

<h2>Commentaires signalés</h2>

<?php
while ($comment = $alerts->fetch())
{
    $comment['comment'] = $purifier->purify($comment['comment']);
    $comment['author'] = $purifier->purify($comment['author']);
?>
    <p><strong><?= $comment['author'] ?></strong> le <?= $comment['comment_date_fr'] ?></p>
    <p><?= $comment['comment'] ?></p>
    <a id="checkbutton" href="index.php?action=checkcomment&amp;commentid=<?= $comment['id'] ?>">Valider le commentaire</a>
    <div class="deletecontainer">
        <button  class="first_step_deletecomment" id="<?= $comment['id'] ?>" onclick="document.getElementById('<?= $comment['id'] ?>').style.display='none'">Supprimer</button>
        <a id="deletebutton" href="index.php?action=deletecomment&amp;id=<?= $comment['id'] ?>">Confirmer</a>
    </div>
<?php
}
?>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/adminheader.php'); ?>
<?php require('template.php'); ?>
