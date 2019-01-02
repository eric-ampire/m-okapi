<h1>M-OKAPI</h1>
<h3>Nouvelle sortie</h3>

<form method="post" action="<?php echo site_url('utilisateur/nouvelle_sortie'); ?>" >
    Categorie de sortie :
    <input type="text" name="categorie_sortie" /></br>
    Exercices budgetaire : 
    <input type="text" name="exercice_budgetaire" /></br>
    Seuil :
    <input type="text" name="seuil" /></br>
    <input type="submit" value="Enregistrer" />
</form>
<a href="<?php echo site_url('utilisateur/cont_parametre'); ?>">Retour</a>