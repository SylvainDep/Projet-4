<form method="post">
    <label>Titre</label>
    <input type="text" value="<?= $post['title'] ?>"/>
    <label>Contenu</label>
    <textarea id="blogbody"><?= $post['content'] ?></textarea>
    <input type="submit"/>
</form>