<h1>M-OKAPI</h1>
<p>
    <h3>Creer un nouvel exercices budgetaire</h3>
</p>
<form method="post" action="<?php echo site_url('utilisateur/creation_exercicesB');  ?>">
    Budget initial :
    <input type="text" name="budgetI" /></br>
    Date de creation :
    <input type="date" name="dtcreation" /></br>
    Date debut de l'exercices :
    <input type="date" name="dtdebut"/></br>
    Date fin de l'exercices :
    <input type="date" name="dtfin"/></br>
    <input type="submit" value="creer">
</form>