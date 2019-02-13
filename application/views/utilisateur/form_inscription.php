<h1>M-OKAPI</h1>
<h1>Créer votre compte M-OKAPI</h1>
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


<?php echo form_open("utilisateur/nouvel_utilisateur")?>
    <table>
        <tr>
            <td>Nom complet:</td>
            <td><input type="text" name="nomcomplet" ></td>
            <td><?php echo form_error('nomcomplet'); ?></td>
        </tr>

        <tr>
            <td>Email:</td>
            <td><input type="text" name="email" /></td>
            <td><?php echo form_error('email'); ?></td>
        </tr>

        <tr>
            <td>Login:</td>
            <td><input type="text" name="login" /></td>
            <td><?php echo form_error('login'); ?></td>
        </tr>

        <tr>
            <td>Mot de passe:</td>
            <td><input type="password" name="mdp" /></td>
            <td><?php echo form_error('mdp'); ?></td>
        </tr>

        <tr>
            <td>Confirmer:</td>
            <td><input type="password" name="mdpconf" /></td>
            <td><?php echo form_error('mdpconf'); ?></td>
            <td><?php if (isset($password_message)) echo $password_message; echo form_error('mdp'); ?></td>
        </tr>

        <tr>
            <td><input type="submit" value="Créer" /></td>
            <td><?php echo anchor('utilisateur/form_authentification', 'J\'ai déjà un compte')?></td>
        </tr>
    </table>
</form>