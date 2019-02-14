<h1>M-OKAPI</h1>
<style type="text/css">
        ::selection { background-color: #E13300; color: white; }
    ::-moz-selection { background-color: #E13300; color: white; }

body {
	background-color: #fff;
	margin: 40px;
	font: 13px/20px normal Helvetica, Arial, sans-serif;
	color: #4F5155;
}
        h4{
            position:absolute;
            margin-left:80%;
        }
        p {
	margin: 12px 15px 12px 15px;
        }
        h1 {
	color: #444;
	background-color: transparent;
	border-bottom: 1px solid #D0D0D0;
	font-size: 19px;
	font-weight: normal;
	margin: 0 0 14px 0;
	padding: 14px 15px 10px 15px;
    }
    a {
	color: #003399;
	background-color: transparent;
	font-weight: normal;
}
</style>
<p>
    <a href="<?php echo site_url('utilisateur/menu'); ?>">menu</a>
    <h2>Mon exercices</h2>
    <?php

    $montant_entree = 0;
    foreach ($entres as $item) {
        $montant_entree = $item->montant + $montant_entree;
    }

    $f_entree = $montant_entree;

    $montant_utilise = 0;
    foreach ($action_budgetaires as $item) {
        $montant_utilise = $item->montant_utilise + $montant_utilise;
    }

    $montant = $montant_utilise;

    $solde = 0;
    foreach ($exercice_budgetaires as $item) {

        $solde = $item->budget_initial + $solde;
        $dt_creation = date_create($item->date_creation);
        $dt_debut = date_create($item->date_debut);
        $dt_fin = date_create($item->date_fin);
    }

    if (count($exercice_budgetaires) > 0) {
        $fin = date_format($dt_fin,'d-m-Y');
        $today = date('d-m-Y');
        $result = date_diff(new DateTime($fin), new DateTime($today));


        echo "  
        Solde :<h2>".$solde."$</h2></br>
        Date de creation :".date_format($dt_creation,'d-m-Y')."</br>
        Date debut de l'exercice :".date_format($dt_debut,'d-m-Y')."</br>
        Date fin de l'exercice :".$fin."</br>
        Jous restants :".$result->days." jour(s)</br>
        Ma connsommation :<h2>".$montant."$ consommé</h2></br>
        Pourcentage sur le solde :<h2>".(($montant/$solde)*100)." % utilisé</h2>";
    }
    ?> 
</p>

<p>
    <h2>Mes Sorties / Objectifs </h2>


    <?php

        foreach ($categories as $item) {

            echo " Description : ".$item->nom."</br>";
        }
    ?>
</p>

<p>
    <h2>Mes entrees</h2>
        <?php

        $montant_entree = 0;
        foreach ($entres as $s) {
            $montant_entree = $s->montant + $montant_entree;

            echo "montant :".$s->montant."$ , -- Description : ".$s->nom.
                ", -- date de l'entree : ".$s->date_entree;
        }

        $f_entree = $montant_entree;
        ?>
</p>

<p>
    <h2>Mes actions</h2>
    <?php

    foreach ($action_budgetaires as $s) {
        echo "Montant utilise :".$s->montant_utilise." -- motif :".
        $s->motif." -- date de creation :".
        $d = date_format($dt = date_create($s->date_creation),'d-m-Y')."</br>";
    }

    ?>
</p>