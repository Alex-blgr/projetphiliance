 
	<?php
	session_start();
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=membre', 'root', '');
	include_once('cookiconnex.php');
	if(isset($_POST['formconnexion']))
	{
	   $mailconnect = htmlspecialchars($_POST['mailconnect']);
	//    $mdpconnect = sha1($_POST['mdpconnect']);
	   $mdpconnect = $_POST['mdpconnect'];
	   if(!empty($mailconnect) AND !empty($mdpconnect))
	   {
	      $requser = $bdd->prepare("SELECT * FROM membres WHERE mail = ? AND mdp = ?");
	      $requser->execute(array($mailconnect, $mdpconnect));
	      $userexist = $requser->rowCount();
	      if($userexist == 1)
	      {
	         if(isset($_POST['rememberme'])) {
	            setcookie('email',$mailconnect,time()+3600,null,null,false,true);
	            setcookie('password',$mdpconnect,time()+3600,null,null,false,true);
	         }
	         $userinfo = $requser->fetch();
	         $_SESSION['id'] = $userinfo['id'];
	         $_SESSION['pseudo'] = $userinfo['pseudo'];
	         $_SESSION['mail'] = $userinfo['mail'];
	         header("Location: connect.php?id=".$_SESSION['id']);
	      }
	      else
	      {
	         $erreur = "Mauvais mail ou mot de passe !";
	      }
	   }
	   else
	   {
	      $erreur = "Tous les champs doivent être complétés !";
	   }
	}
	?>
	<html>
	   <head>
	      <title>TUTO PHP</title>
	      <meta charset="utf-8">
	   </head>
	   <body>
	      <div align="center">
	         <h2>Connexion</h2>
	         <br /><br />
	         <form method="POST" action="">
	            <input type="email" name="mailconnect" placeholder="Mail" />
	            <input type="password" name="mdpconnect" placeholder="Mot de passe" />
	            <br /><br />
	            <input type="checkbox" name="rememberme" id="remembercheckbox" /><label for="remembercheckbox">Se souvenir de moi</label>
	            <br /><br />
	            <input type="submit" name="formconnexion" value="Se connecter !" />
	         </form>
	         <?php
	         if(isset($erreur))
	         {
	            echo '<font color="red">'.$erreur."</font>";
	         }
	         ?>
	      </div>
	   </body>
	</html>