<form method="post" action="index.php?action=addpost&amp;id=<?= $post['id'] ?>">
    <label>Titre</label>
    <input type="text" name="title"/>
    <label>Contenu</label>
    <textarea id="blogbody" name="content">Hello, World!</textarea>
    <input type="submit"/>
</form>