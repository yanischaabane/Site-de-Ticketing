<?php $this->titre = 'Ticketing'; ?>
<?php foreach ($tickets as $ticket): ?>
 <article>
 <header>
 <a href="<?= "ticket/index/" . $this->nettoyer($ticket['id']) ?>">
 <h1 class="titreTicket"><?= $this->nettoyer($ticket['titre'])?> | Niveau : <?= $this->nettoyer($ticket['niveau'])?></h1>
    </a>
    <time><?= $this->nettoyer($ticket['date']) ?></time>
    </header>
 <p><?= $this->nettoyer($ticket['contenu']) ?></p>
 </article>
 <hr />
<?php endforeach; ?>
<h1>Nouveau ticket</h1>
<form method="post" action="accueil/ticketadd">
 <input id="titre" name="titre" type="text" placeholder="Le titre de votre ticket"
 required /><br />
 <textarea id="contenu" name="contenu" rows="4"
 placeholder="La raison de votre ticket/l'origine de votre ticket" required></textarea><br />
 <input type="submit" value="soumettre le ticket" />
</form>