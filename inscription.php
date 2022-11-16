<!doctype html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Sign Up </title>
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
	             }else if(isset($_GET['joined'])){
		            //Si joint est passé comme paramètre alors
		            // on ajoute un lien vers la page de connexion
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
          <br> <br>
   
           <button type="submit" name="btn-signup">
             <i class="glyphicon glyphicon-open-file"></i>&nbsp;S'inscrire
            </button>
         <br /> <br>
       <label>Déjà inscrit ! <a href="sign-in.php">Connexion</a></label>
    </form>

  </body>
</html>
