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
    <form method="post" action="<?php echo site_url('utilisateur/update_mdp') ?>" >
        Mot de passe :
        <input type="password" name="mdp" /></br>
        <input type="submit" value="modifier" />
    </form>
</p>