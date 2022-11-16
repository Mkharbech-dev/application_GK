<?php
	//On commence une session
	
	//Les paramètres de connexion
	// $DB_host = "localhost";
	// $DB_user = "root";
	// $DB_pass = "";
	// $DB_name = "GKdb";
	// try {
	// 	//ON crée une nouvelle connexion
	// 	$DB_con = new PDO("mysql:host=$DB_host;dbname=$DB_name",$DB_user,$DB_pass);
	// } catch(PDOException $e) {
	// 	echo $e->getMessage();
	// }

	//****************************************************

	class connexion
		{ 
		public function ConnectBase()
		{
			$DB_con=new PDO('mysql:host=localhost;dbname=GKdb','root',''); 
			return $DB_con;
		}   
	}
	$connexion = new connexion();
	$DB_con = $connexion->ConnectBase();
	

	
?>
