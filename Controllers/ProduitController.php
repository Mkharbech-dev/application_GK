<?php
class creerProduit{
    public function create(){
        
        // récupération des données depuis le formulaire
        $libelle = $_POST['libelle'];
        $prix = $_POST['prix'];
        $quantite = $_POST['quantite'];
        if(!empty($libelle) AND !empty($prix) AND !empty($quantite)){
        // création d'un objet Produit
        require_once("../Models/Produit.php");
        $produit = new Produit($libelle,$prix,$quantite);
        //Insertion du produit
        require_once("../Models/RepositoryProduit.php");
        $produitDao = new DaoProduit();
        $produitDao->createProduit($produit);
        }else{
            $errorMsg = "Veuillez compléter tous les champs svp!";
        } 
        return $errorMsg;  
    }  
}
$createProduct = new creerProduit();
$createProduct->create();
header("Location:../Views/ListProduits.php")


?>