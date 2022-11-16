<?php
require_once(dirname(__FILE__)."/../Config/Connexion.php");
require_once(dirname(__FILE__)."/Produit.php"); 

class DaoProduit{
   
    public function createProduit(Produit $produit)
    {
        $pdoCon = new Connexion();
        $conn = $pdoCon->getConnection();
        $sql = "INSERT INTO produit (libelle, prix, quantite)
                VALUES ('".$produit->getLibelle()."', '".$produit->getPrix()."', '".$produit->getQuantite()."')";
        $conn->exec($sql);
        echo "<div class='alert alert-success'>votre produit a été bien inséré</div>";  
    }

    public function readProduit(){
        $produits=array();
        $i=0;
        $pdoCon = new Connexion();
        $conn = $pdoCon->getConnection();
        $strSQL = "SELECT * FROM produit";
        //execution de la requête et affichage des résultats
        foreach ($conn->query($strSQL) as $row) {
            $produit = new Produit($row['libelle'],$row['prix'],$row['quantite']);
            $produit->setId($row['id']);
            //echo $row['libelle']." ".$row['prix']." ".$row['quantite']."<br/>";
            $produits[$i]=$produit;
            $i++;
        }
        return $produits;
    }


  
}



?>