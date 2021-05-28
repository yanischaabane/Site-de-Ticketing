<!doctype html>
<html lang="fr">
    <head>
    <meta charset="UTF-8" />
    <base href="<?= $racineWeb ?>">
    <link rel="stylesheet" href="contenu/style.css" />
    <title><?= $titre ?></title> 
    </head>
    <body>
    <div id="global">
    <header>
    <a href=""><h1 id="titreBlog">Outil de Ticketing</h1></a>
    </header>
    <nav>
    <a href="gestion"><h3>Gestion des Niveaux</h3></a>
    </nav>
    <div id="contenu">
    <?= $contenu ?>
        </div>
            <footer id="piedBlog">
                Plateforme de ticketing réalisé avec PHP, HTML5 et CSS.
            </footer>
        </div>
    </body>
</html>
