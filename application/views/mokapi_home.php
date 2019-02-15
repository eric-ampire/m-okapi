<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html>
    <head>
        <title>M-OKAPI</title>
        <meta charset="utf-8" />
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
        <h1>M-OKAPI</h1>
    </head>
    <body>
        <h1>Bienvenue sur M-OKAPI</h1>
        <p>
            <em>Votre gestionnaire de budget optimisé</em>
        </p>
        <?php echo $page ?>
        <p>
            <a href="<?php echo site_url('utilisateur/form_inscription') ?>">Créer un compte</a>
        </p>
    </body>
</html>
