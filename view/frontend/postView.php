<?php
    require_once 'vendor/htmlpurifier/library/HTMLPurifier.auto.php';

    $config = HTMLPurifier_Config::createDefault();
    $purifier = new HTMLPurifier($config);

    $post['title'] = $purifier->purify($post['title']);
    $post['content'] = $purifier->purify($post['content']);

?>


<?php $title = htmlspecialchars($post['title']); ?>

<?php ob_start(); ?>
<?php if(!empty($_GET['origin']) && $_GET['origin'] == 'commentalert') {
    echo '<p id="confirmationmodalcontainer">Le commentaire a bien été signalé</p>';
} ?>

<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= $post['title'] ?>
        <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>

    <p>
        <?= $post['content'] ?>
    </p>
</div>

<h2>Commentaires</h2>

<div id="commentarea">
    <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>

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
            <div class="signalcontainer">
                <button  class="first_step_signal" id="<?= $comment['id'] ?>" onclick="document.getElementById('<?= $comment['id'] ?>').style.display='none'">Signaler</button>
                <a  id="signalbutton" href="index.php?action=doalert&amp;postid=<?= $post['id'] ?>&amp;commentid=<?= $comment['id'] ?>">Confirmer</a>
            </div>
        </div>
    <?php
    }
    ?>
</div>
<?php $content = ob_get_clean(); ?>

<?php require('view/frontend/header.php'); ?>
<?php require('template.php'); ?>
