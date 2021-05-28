<?php $this->titre = "Ticketing - Gestion" ; ?>

<center>
<h2>Gestion des Statuts</h2>
</center>
<?php foreach ($statuts as $statut): ?>
<article>
    <header>
        <h3><?= "- ".$this->nettoyer($statut['name']) ?></h3>
    </header>
    <form method="post" action="gestion/statutdelete">
        <input type="hidden" name="id" value="<?= $this->nettoyer($statut['id']) ?>" />
        <input type="submit" value="Supprimer le statut" />
    </form>
    <br>
    <form method="post" action="gestion/statutupdate">
        <input type="hidden" name="id" value="<?= $this->nettoyer($statut['id']) ?>" />
        <input id="name" name="name" type="text" placeholder="Nouveau nom du statut"
        required />
        <input type="submit" value="Modifier le statut" />
    </form>
</article>
<?php endforeach; ?>

<center>
<h1>Ajouter un statut</h1>
<form method="post" action="gestion/statutadd">
 <input id="name" name="name" type="text" placeholder="Le nom du nouveau statut"
 required />
 <input type="submit" value="soumettre le nouveau statut" />
</form>