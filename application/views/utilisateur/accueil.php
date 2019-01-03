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
        $str = 'SELECT budget_initial FROM exercice_budgetaire WHERE id_utilisateur = :id_utilisateur';
        $req = $db->prepare($str);
        $val = array(
            'id_utilisateur' => $identifiant
        );
        $req->execute($val);
        
        $tab_sujet = array();
        while($s = $req->fetch(PDO::FETCH_OBJ))
        {
            $budget = $s->budget_initial;
            echo $budget."$";
        }
        
    echo "  
    </h2>
</p>

<p>
        <h3>Progression evolution :</h3>";
        $identifiant = $this->session->id;  
        $db = new PDO('mysql:host=localhost; dbname=mokapi', 'root', '');
        $str = 'SELECT montant_utilise FROM action_budgetaire';
        $req = $db->prepare($str);
        $val = array(
            'id_utilisateur' => $identifiant
        );
        $req->execute($val);
        
        $tab_sujet = array();
        $montant = 0;
        while($s = $req->fetch(PDO::FETCH_OBJ))
        {
            $montant = $s->montant_utilise + $montant;
        }echo "<h2>".$montant."$ utilises </h2>";
        $solde = ($montant/$budget)*100;
        echo "Soit : <h2>".$solde."% usee</h2>";


        ?>
</p>

<p>
        <h3>calendrier de l'evolution :</h3>
        <?php
            echo $this->load->calendar->generate();
        ?>

        </br>
        
    
        
        Votre budget a ete initialise a la date :<?php
            $identifiant = $this->session->id;  
            $db = new PDO('mysql:host=localhost; dbname=mokapi', 'root', '');
            $str = 'SELECT date_creation FROM exercice_budgetaire WHERE id_utilisateur = :id_utilisateur';
            $req = $db->prepare($str);
            $val = array(
                'id_utilisateur' => $identifiant
            );
            $req->execute($val);
            
            $tab_sujet = array();
            while($s = $req->fetch(PDO::FETCH_OBJ))
            {
                echo $s->date_creation ;
            }
        ?>
    
    </br>
        Sa duree va du : <?php  
        $identifiant = $this->session->id;  
        $db = new PDO('mysql:host=localhost; dbname=mokapi', 'root', '');
        $str = 'SELECT date_debut FROM exercice_budgetaire WHERE id_utilisateur = :id_utilisateur';
        $req = $db->prepare($str);
        $val = array(
            'id_utilisateur' => $identifiant
        );
        $req->execute($val);
        
        $tab_sujet = array();
        while($s = $req->fetch(PDO::FETCH_OBJ))
        {
            $debut = $s->date_debut;
            $d = date_create($debut);
            echo date_format($d,'d-m-Y');
        }
        echo "</br>
        Au : ";
        $identifiant = $this->session->id;  
        $db = new PDO('mysql:host=localhost; dbname=mokapi', 'root', '');
        $str = 'SELECT date_fin FROM exercice_budgetaire WHERE id_utilisateur = :id_utilisateur';
        $req = $db->prepare($str);
        $val = array(
            'id_utilisateur' => $identifiant
        );
        $req->execute($val);
        
        $tab_sujet = array();
        while($s = $req->fetch(PDO::FETCH_OBJ))
        {
            $fin = $s->date_fin;
            $f = date_create($fin);
            $ff = date_format($f,'d-m-Y');
            $tb_fin = explode("-", $ff);
            echo $ff; 
        }
        $today = date('d-m-Y');
        // transformation de la chaine date en un tableau
        $tb_today = explode("-",$today);
        echo "</br><h3>Jours restants :</h3><h2> ".
            $result = $ff - $today." jour(s)</h2></br>";
        
        ?>
</p>

<p>
        <h3>Les derniers mouvements :</h3>
        <?php
        $identifiant = $this->session->id;  
        $db = new PDO('mysql:host=localhost; dbname=mokapi', 'root', '');

        /*$str = 'SELECT montant_utilise, motif, date_creation FROM 
        action_budgetaire, sortie, exercice_budgetaire WHERE 
        action_budgetaire.id_sortie = sortie.id_sortie And 
        sortie.id_exercice_budgetaire = exercice_budgetaire.id_exercice_budgetaire
         and id_utilisateur = :id_utilisateur';*/

         $str = 'SELECT montant_utilise, motif, date_creation from action_budgetaire';

        $req = $db->prepare($str);
        $val = array(
            'id_utilisateur' => $identifiant
        );
        $req->execute($val);
        
        $tab_sujet = array();
        while($s = $req->fetch(PDO::FETCH_OBJ))
        {
            echo "montant utilise : ".$s->montant_utilise
            ." motif :".$s->motif." date de creation :"
            .$s->date_creation."</br>";
        }
        
    ?>
</p>

