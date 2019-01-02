<h1>M-OKAPI</h1>
<h3>Nouvelle action budgetaire</h3>

<form method="post" action="<?php echo site_url('utilisateur/nouvelle_action_budgetaire'); ?>" >
    Sortie :
    <input type="text" name="id_sortie" /></br>
    Montant utilise :
    <input typpe="text" name="montant" /></br>
    Motif d'usage :
    <input type="text" name="motif" /></br>
    Date creation :
    <input type="date" name="dtcreation" /></br>
    <input type="submit" value="Enregistrer" />
</form>
<a href="<?php  echo site_url('utilisateur/cont_parametre'); ?>">Retour</a>