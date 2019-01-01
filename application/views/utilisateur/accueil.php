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
        $str = 'SELECT budget_initial FROM exercice_budgetaire WHERE id_utilisateur = :id_utilisateur';
        $req = $db->prepare($str);
        $val = array(
            'id_utilisateur' => $identifiant
        );
        $req->execute($val);
        
        $tab_sujet = array();
        while($s = $req->fetch(PDO::FETCH_OBJ))
        {
            echo $s->budget_initial;
        }
        
       
    ?></h2>
</p>
