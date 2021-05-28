<?php $this->titre = "Ticketing - " . $this->nettoyer($ticket['titre']); ?>

<article>
 <header>
 <h1 class="titreTicket"><?= $this->nettoyer($ticket['titre']) ?> | Statut : <?= $this->nettoyer($ticket['niveau'])?></h1>
 <time><?= $this->nettoyer($ticket['date']) ?></time>
 </header>
 <p><?= $this->nettoyer($ticket['contenu']) ?></p>
 <h2>Mettre à jour le niveau du ticket</h2>
 <form method="post" action="ticket/changestatus">
 <select name="statut" id="statut">
    <?php foreach ($statut as $statuts): ?>
      <option value=<?= $this->nettoyer($statuts['id'])?>><?= $this->nettoyer($statuts['name'])?></option>
    <?php endforeach; ?>
 </select>
 <br />
 <input type="hidden" name="id" value="<?= $this->nettoyer($ticket['id']) ?>" />
 <br />
 <input type="submit" value="Valider la modification" />
 </form>
</article>
<hr />
<header>
 <h1 id="titreReponses">Réponses à <?= $this->nettoyer($ticket['titre']) ?></h1>
</header>
<?php foreach ($commentaires as $commentaire): ?>
 <h3><?= $this->nettoyer($commentaire['auteur']) ?> :</h3>
 <p><?= $this->nettoyer($commentaire['contenu']) ?></p>
<br>
<p>(<?= $this->nettoyer($commentaire['date'])?>)</p>
<?php endforeach; ?>
<form method="post" action="ticket/commenter">
 <input id="auteur" name="auteur" type="text" placeholder="Votre pseudo"
 required /><br />
 <textarea id="txtCommentaire" name="contenu" rows="4"
 placeholder="Votre commentaire" required></textarea><br />
 <input type="hidden" name="id" value="<?= $ticket['id'] ?>" />
 <input type="submit" value="Commenter" />
</form>


