<?php $this->titre = "Ticketing - Gestion" ; ?>

<center>
<h2>Gestion des Niveaux</h2>
</center>
<?php foreach ($niveaux as $niveau): ?>
<article>
    <header>
        <h3><?= "- ".$this->nettoyer($niveau['name']) ?></h3>
    </header>
    <form method="post" action="gestion/niveaudelete">
        <input type="hidden" name="id" value="<?= $this->nettoyer($niveau['id']) ?>" />
        <input type="submit" value="Supprimer le niveau" />
    </form>
    <br>
    <form method="post" action="gestion/niveauupdate">
        <input type="hidden" name="id" value="<?= $this->nettoyer($niveau['id']) ?>" />
        <input id="name" name="name" type="text" placeholder="Nouveau nom du niveau"
        required />
        <input type="submit" value="Modifier le niveau" />
    </form>
</article>
<?php endforeach; ?>
