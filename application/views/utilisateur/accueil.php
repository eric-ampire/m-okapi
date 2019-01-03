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
        
        $identifiant = $this->session->id;  
        $db = new PDO('mysql:host=localhost; dbname=mokapi', 'root', '');
        $str = 'SELECT montant FROM 
        entree WHERE
        id_utilisateur = :id_utilisateur';
        $req = $db->prepare($str);
        $val = array(
            'id_utilisateur' => $identifiant
        );
        $req->execute($val);
        
        $tab_sujet = array();
        $montant_entree = 0;
        while($s = $req->fetch(PDO::FETCH_OBJ))
        {
            $montant_entree = $s->montant + $montant_entree;
        }
        $f_entree = $montant_entree;
        
        $identifiant = $this->session->id;  
        $db = new PDO('mysql:host=localhost; dbname=mokapi', 'root', '');
        $str = 'SELECT budget_initial FROM 
        exercice_budgetaire WHERE
        id_utilisateur = :id_utilisateur';
        $req = $db->prepare($str);
        $val = array(
            'id_utilisateur' => $identifiant
        );
        $req->execute($val);
        
        $tab_sujet = array();
        $solde = 0;
        while($s = $req->fetch(PDO::FETCH_OBJ))
        {
            $solde = $s->budget_initial + $solde;
        }
        echo $solde."$";
        echo "</h2></br>";
        echo "Entrees : <h2>".$f_entree."$</h2>";
        echo "</br>
</p>
<p>
    <h3>Progression evolution :</h3>";

    $identifiant = $this->session->id;  
    $db = new PDO('mysql:host=localhost; dbname=mokapi', 'root', '');
    $str = 'SELECT montant_utilise FROM 
    action_budgetaire';
    $req = $db->prepare($str);
    $val = array(
        'id_utilisateur' => $identifiant
    );
    $req->execute($val);
    
    $tab_sujet = array();
    $montant_utilise = 0;
    while($s = $req->fetch(PDO::FETCH_OBJ))
    {
        $montant_utilise= $s->montant_utilise + $montant_utilise;
    }
    $montant = $montant_utilise;
    echo "<h2>".$montant."$</h2> utilise   soit :<h2>".(($montant/$solde)*100)."%</h2> consomme's "; 
    
    ?>
</p>

<p>
    <h3>Calendrier de l'evolution :</h3> 
    <?php  
        echo $this->calendar->generate();
        echo "</br>";
        $identifiant = $this->session->id;  
        $db = new PDO('mysql:host=localhost; dbname=mokapi', 'root', '');
        $str = 'SELECT date_creation, date_debut, date_fin FROM 
        exercice_budgetaire WHERE id_utilisateur = :id_utilisateur';
        $req = $db->prepare($str);
        $val = array(
            'id_utilisateur' => $identifiant
        );
        $req->execute($val);
        
        $tab_sujet = array();
        $solde = 0;
        while($s = $req->fetch(PDO::FETCH_OBJ))
        {
            $dt_creation = date_create($s->date_creation);
            $dt_debut = date_create($s->date_debut);
            $dt_fin = date_create($s->date_fin);
        }

        echo "Ce budget a ete initialise en date du :".date_format($dt_creation,'d-m-Y');
        echo "</br>Sa duree va du :".date_format($dt_debut,'d-m-Y');
        echo"</br>Au :".$fin = date_format($dt_fin,'d-m-Y');
        
        $today = date('d-m-Y');
        $result = $fin - $today;
        echo "</br> Jours restants :<h3>".$result." jour(s)</h3";
    
    
    ?>
</p>

<p>
    <h3>Les derniers mouvements</h3> 
    <?php
        $identifiant = $this->session->id;  
        $db = new PDO('mysql:host=localhost; dbname=mokapi', 'root', '');
        $str = 'SELECT montant_utilise, motif, date_creation FROM 
        action_budgetaire';
        $req = $db->prepare($str);
        $val = array(
            'id_utilisateur' => $identifiant
        );
        $req->execute($val);
        
        $tab_sujet = array();
        $solde = 0;
        while($s = $req->fetch(PDO::FETCH_OBJ))
        {
            echo "Montant utilise :".$s->montant_utilise." motif :".
            $s->motif." date de creation :".$s->date_creation."</br>";
        }

    ?>
</p>

