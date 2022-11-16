<?php
	require_once ('db_conf.php');
	//Si l'utilisateur est déjà connecté on le redirige vers la page d'accueil
	if(isset($_POST['btn-signup'])) {
		//récupération des informations du formulaire
		$uname = trim($_POST['txt_uname']);
		$umail = trim($_POST['txt_umail']);
		$upass = trim($_POST['txt_upass']); 
  	//Remplissage des messages d'erreurs dans un tableau
 	if($uname=="") {
      	$error[] = "Vous devez saisir un nom d'utilisateur!"; 
   	} else if($umail=="") {
		$error[] = "Vous devez saisir un email"; 
	} else if(!filter_var($umail, FILTER_VALIDATE_EMAIL)) {
      	$error[] = 'Vous devez saisir un email valide';
   	} else if($upass=="") {
      	$error[] = "Vous devez saisir un mot de passe";
   	} else if(strlen($upass) < 6) {
    	$error[] = "Le mot de passe doit avoir au moins 6 caractères"; 
   	} 
   	else {
	// Il n'y a pas d'erreurs
	try {
	// On prépare la requête
	// ON recherche si l'utilisateur existe déjà dans la base
	// La recherche se fait par username ou email
	$req = $DB_con->prepare("SELECT user_name,user_email FROM users WHERE user_name=:uname OR user_email=:umail");
	$req->execute(array(':uname'=>$uname, ':umail'=>$umail));
	//On récupère le résultat
	$ligne=$req->fetch(PDO::FETCH_ASSOC);
    //si l'utilisateur n'existe pas dans la base alors $ligne 
    if ($ligne){
	//Si l'utilisateur existe on prépare les messages d'erreurs 
	if($ligne['user_name']==$uname) {
	$error[] = "Désolé, le nom d'utilisateur existe déjà !";
	}
	else if($ligne['user_email']==$umail) {
	$error[] = "Désolé, l'email existe déjà";
	} 
	}
	else 
	{
	//si l'utilisateur n'existe pas alors on l’ajoute dans la BD
    //hashage  du mot de passe avant son ajout dans la base
	$new_password = md5($upass);
	//pour une question de sécurité on ne doit pas envoyer une requête au serveur
	// avec les valeurs réelles
	// pour cela on doit préparer la requête avec des paramètres fictifs (on utilise :)
	$sql = "INSERT INTO users(user_name,user_email,user_pass) VALUES(:uname, :umail, :upass)";
	$req = $DB_con->prepare($sql);	
	// puis on relie ensemble les valeurs réelles et les paramètres fictifs avec la méthode bindparam()	
	$req->bindparam(":uname", $uname);
	$req->bindparam(":umail", $umail);
	$req->bindparam(":upass", $new_password);            
	// Enfin on exécute la requête (avec la méthode execute() et non plus query() ou exec() )
	$req->execute(); 
	//Après l'inscription on redirige vers la même page
	//mais en passant joined comme paramètre
	//$error[] = "l'utilisateur est ajoutée avec succés !";          
    }
    } catch(PDOException $e) {
		echo $e->getMessage();
    }
	} 
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Sign Up : TP5</title>
</head>
<body>
<form method="post">
	<h2>Inscription</h2><hr />
	<?php
		if(isset($error)){
			foreach($error as $error){
		?>
		<div>
			<?php echo $error; ?>
		</div>
			<?php
			}
			?>
		<div class="alert alert-info">
			Enregistré avec succès <a href='index.php'>Connexion</a> ici
		</div>
			<?php
			}
			?>
		<input type="text" name="txt_uname" placeholder="Votre nom d'utilisateur" value="<?php if(isset($error)){echo $uname;}?>" />
		<br> <br>
		<input type="text" name="txt_umail" placeholder="Votre E-Mail" value="<?php if(isset($error)){echo $umail;}?>" />
		<br> <br>
	<input type="password" name="txt_upass" placeholder="Votre mot de passe" />
		<br><br>

		<button type="submit" name="btn-signup">
			<i class="glyphicon glyphicon-open-file"></i>&nbsp;S'inscrire
		</button>
		<br /> <br>
	<label>Déjà inscrit ! <a href="sign-in.php">Connexion</a></label>
</form>
</body>
</html>
