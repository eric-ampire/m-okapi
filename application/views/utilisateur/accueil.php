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
<h4><?php echo $this->session->nomcomplet; ?> est connecte</h4>
<p>
<a href="<?php echo site_url('utilisateur/menu')?>">Menu</a></br>
<a href="<?php echo site_url('utilisateur/deconnexion') ?>">Deconnexion</a>
</p>
<h3>Exercices budgetaire en cours</h3>
<p>
    votre solde : <h2>
    <?php

        $montant_entree = 0;
        foreach ($entres as $item) {
            $montant_entree = $item->montant + $montant_entree;
        }

        $f_entree = $montant_entree;

        $montant_utilise = 0;
        foreach ($action_budgetaires as $item) {
            $montant_utilise= $item->montant_utilise + $montant_utilise;
        }

        $montant = $montant_utilise;

        $solde = 0;
        foreach ($exercice_budgetaires as $item) {
            $solde = $item->budget_initial + $solde;
        }


        echo $solde."$";
        echo "</h2></br>";
        echo "Entrees : <h2>".$f_entree."$</h2>";
        echo "</br>
</p>
<p>
    <h3>Progression evolution :</h3>";

        if ($montant > 0) {
            echo "<h2>".$montant."$</h2> utilise   soit :<h2>".(($montant/$solde)*100)."%</h2> consomme's ";
        }
    ?>
</p>

<p>
    <h3>Calendrier de l'evolution :</h3> 
    <?php  
        echo $this->calendar->generate();
        echo "</br>";

        foreach ($exercice_budgetaires as $item) {
            $dt_creation = date_create($item->date_creation);
            $dt_debut = date_create($item->date_debut);
            $dt_fin = date_create($item->date_fin);
        }

        if (count($exercice_budgetaires) > 0) {
            echo "Ce budget a ete initialise en date du :".date_format($dt_creation,'d-m-Y');
            echo "</br>Sa duree va du :".date_format($dt_debut,'d-m-Y');
            echo"</br>Au :" . $fin = date_format($dt_fin,'d-m-Y');

            $today = date('d-m-Y');
            $result = date_diff(new DateTime($fin), new DateTime($today));

            if($result->d <=0)
            {
                echo "</br> <h2>L'execices tire a sa fin .</h2>";
                echo "<h3>Veuillez creer un nouvel exercices</h3>";
            }
            else
            {
                echo "</br> Jours restants :<h3>" .$result->days." jour(s)</h3>";
            }
        }
    ?>
</p>

<p>
    <h3>Les derniers mouvements</h3> 
    <?php

        foreach ($action_budgetaires as $item) {
            $montant_utilise= $item->montant_utilise + $montant_utilise;

            echo " Montant utilise :".$item->montant_utilise." Motif :".
            $item->motif." date de creation :".
            $d = date_format($dt = date_create($item->date_creation),'d-m-Y')."</br>";
        }

    ?>
</p>

