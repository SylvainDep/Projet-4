<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <title><?= $title ?></title>
        <link href="public/css/style.css" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Lato|Raleway" rel="stylesheet">
        <meta name="viewport" content="width=device-width">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
        <script type="text/javascript" src="/public/js/tinymce/tinymce.min.js"></script>
        <script>
            tinymce.init({
                selector: '#blogbody',
                mode : "textareas",
                language : "fr_FR"
            });
        </script>
    </head>
        
    <body>
        <header>
            <?= $header ?>
        </header>

        <div id="hero">
            <h1>Jean Forteroche<br/>Billet simple pour l'Alaska</h1>
        </div>

        <div id="content">
            <?= $content ?>
        </div>
    </body>
</html>