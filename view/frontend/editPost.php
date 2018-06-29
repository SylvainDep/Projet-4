<form method="post" action="index.php?action=updatepost&amp;id=<?= $post['id'] ?>" >
    <label>Titre</label>
    <input type="text" name="title" value="<?= $post['title'] ?>"/>
    <label>Contenu</label>
    <textarea id="blogbody" name="content"><?= $post['content'] ?></textarea>
    <input type="submit"/>
</form>
<a href="index.php?action=deletepost&amp;id=<?= $post['id'] ?>">Supprimer l'article</a>