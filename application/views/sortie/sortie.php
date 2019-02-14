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
<h3>Nouvelle sortie</h3>

<form method="post" action="<?php echo site_url('utilisateur/nouvelle_sortie'); ?>" >
    <table>
        <tr>
            <td>Categorie de sortie :</td>
            <td>

                <select required name="categorie_sortie" >
                    <?php foreach ($cat_sortie as $item) {
                        echo "<option value=" . $item->id . ">". $item->nom . "</option>";
                    }?>
                </select>
            </td>
        </tr>

        <tr>
            <td>Exercices budgetaire :</td>
            <td>
                <select required name="exercice_budgetaire" >
                    <?php foreach ($exo_budgetaire as $item) {
                        echo "<option value=" . $item->id . ">". $item->budget_initial . "</option>";
                    }?>
                </select>
            </td>
        </tr>

        <tr>
            <td>Seuil :</td>
            <td><input type="text" name="seuil" required /></br></td>
            <td><?php echo form_error('seuil'); ?></td>
        </tr>
    </table>

    <input type="submit" value="Enregistrer" />
</form>
<a href="<?php echo site_url('utilisateur/cont_parametre'); ?>">Retour</a>