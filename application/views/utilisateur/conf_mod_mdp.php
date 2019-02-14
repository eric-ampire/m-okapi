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
<a href="<?php echo site_url('utilisateur/parametre'); ?>">annuler</a>
<h2>Modifier la clé</h2>
<p>
    <?php echo form_open("utilisateur/update_mdp")?>
        <table>
            <tr>
                <td>Ancien Mot de passe :</td>
                <td><input type="password" name="old_mdp" required/></br></td>
                <td><?php echo form_error('old_mdp'); ?></td>
            </tr>

            <tr>
                <td>Nouveau mot de passe :</td>
                <td><input type="password" name="new_mdp" required/></br></td>
                <td><?php echo form_error('new_mdp'); ?></td>
            </tr>

            <tr>
                <td>Ancien Mot de passe :</td>
                <td><input type="password" name="confirm_mdp" required/></br></td>
                <td><?php echo form_error('confirm_mdp'); ?></td>

            </tr>

            <tr>
                <td><input type="submit" value="modifier" /></td>
            </tr>

        </table>
        <p><?php if (isset($password_error)) echo $password_error; ?></p>
        <p><?php if (isset($password_error_error)) echo $password_error_error; ?></p>
    </form>
</p>


