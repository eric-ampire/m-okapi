<h1>M-OKAPI</h1>

<h3>Nouvelle categorie d'entree</h3>

<form method="post" action="<?php echo site_url('utilisateur/nouvelle_categorie_entree'); ?>">
    Nom categorie:
    <input type="text" name="nom" /></br>
    Montant :
    <input type="text" name="montant" /></br>
    Date entree :
    <input type="date" name="dtcreation" /></br>
    <input type="submit" value="Enregistrer" /></br>

</form>
<a href="<?php echo site_url('utilisateur/cont_parametre');  ?>">Retour</a>