<?php 
require("db_conf.php");  


echo "<a href='index.php'>Accueil</a>";
echo "<table align='center' border=1 width=60%> <tr><th>Name</th><th>Email </th><th colspan=2>Opérations</th></tr>";
	    
         $ins = $DB_con->prepare("SELECT * FROM users");
         $ins->execute();

	  $ins->setFetchMode(PDO::FETCH_ASSOC);

	  $tab = $ins->fetchAll();
         
         foreach ($tab as $row){ 
                 
echo "<tr><td>".$row['user_name']."</td><td>".$row['user_email']."</td>";


echo "<td><a href='modifier.php?id=".$row['user_id']." &name=".$row['user_name']." &mail=".$row['user_email']."' >   modifier   </a></td>";

     $name=$row['user_id'];

echo "<td> <a href='supprimer.php?id=".$name."' >   Supprimer  </a></td>";


	

	}			
		 
echo "</table>";

?>