<h1>M-OKAPI</h1>
<style text="text/css">
        h4{
            position:absolute;
            margin-left:80%;
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
    ?>
</p>
