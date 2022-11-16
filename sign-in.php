<?php
	require_once ('db_conf.php');


	

	if(isset($_POST['btn-login'])) {
		//récupération des informations du formulaire
		
		$umail = $_POST['txt_uname_email'];
		$upass = $_POST['txt_password'];
  
		//On essaie de connecter l'utilisateur  
 		


        try
		   {
			  




          //On prépare la requête 

	$req = $DB_con->prepare("SELECT * FROM users WHERE user_email=:umail");

			  //Un autre manière de relier les valeurs réelles et les paramètres fictifs
			  $req->execute(array(':umail'=>$umail));
			  

			  // Récupérer une ligne avec fetch
			  $ligne=$req->fetch(PDO::FETCH_ASSOC);
			  
			  if($req->rowCount() > 0)
			  {
				 // Si l'utilisteur existe alors
				 // On vérifie son mot de passe saisie avec le hashage enregistré dans la BD
				 if(md5($upass) == $ligne['user_pass'])
				 {
					// Si le mot de passe est correct 
					// alors on lui crée une session 
					
					echo "connecté";
				 }
				 else
				 {
					echo "non connecté";
					header("location: sign-up.php");
				 }
			 
              } 

              else {
			//Si les informations sont erronées
			// on crée la variable $error qui sera affichée en bas
			$error = "informations erronées !";
			
 				} 


               










		   }
		   catch(PDOException $e)
		   {
			   echo $e->getMessage();
		   }


   }
 		
	
?>
<!doctype html>
<html>
	<head>
		<meta charset="utf-8">
		<title>Connexion</title>
	</head>
	<body>
			<form  method="post" id="login-form" action="<?php $_SERVER['PHP_SELF']; ?>" >
      			<h2>Connexion</h2><hr />
           		<div id="error">
		       	 	<?php
						//Si la variable $error existe on l'affiche
						if(isset($error)) { echo $error; }
			  		 ?>
     			</div>
    			<input type="email" name="txt_uname_email" placeholder="Email" required />
       			<br> <br>
       			<input type="password"  name="txt_password" placeholder="mot de passe" required />
    			<br> <br>
      		    <button type="submit" name="btn-login">
				 Connexion
      			 </button> 
     			<br /><br>
   				 <label>Vous n'avez pas un compte ! <a href="sign-up.php"> Inscription</a></label>
			</form>
	</body>
</html>
