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
}</style>
<h3>Nouvelle action budgetaire</h3>

<form method="post" action="<?php echo site_url('utilisateur/nouvelle_action_budgetaire'); ?>" >
    Sortie :
    <?php
            $identifiant = $this->session->id;  
            $db = new PDO('mysql:host=localhost; dbname=mokapi', 'root', '');
            $str = 'SELECT id, seuil FROM 
            sortie ';
            $req = $db->prepare($str);
            $val = array(
                'id_utilisateur' => $identifiant
            );
            $req->execute($val);
            $name = 'id_sortie';
            while($s = $req->fetch(PDO::FETCH_OBJ))
            {
                echo "
                <select name=".$name." >
                    <option value=".$s->id.">".$s->seuil."</option>
                </select>
                    ";
            }
    ?>
    </br>
    Montant utilise :
    <input typpe="text" name="montant" /></br>
    Motif d'usage :
    <input type="text" name="motif" /></br>
    Date creation :
    <input type="date" name="dtcreation" /></br>
    <input type="submit" value="Enregistrer" />
</form>
<a href="<?php  echo site_url('utilisateur/cont_parametre'); ?>">Retour</a>