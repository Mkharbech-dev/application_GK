<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    require_once(dirname(__FILE__)."/../inc/head.php");
    ?> 
    <title>Ajout produit</title>
</head>

<?php
require_once(dirname(__FILE__)."/../Config/Connexion.php");
// echo'salut';

$id_Get = $_GET['id'];
//echo $res;
$libelle='';
$prix="";
$qte = "";
$pdoCon = new Connexion();
$conn = $pdoCon->getConnection();
$sql = $conn->prepare( "select * from produit where id= $id_Get");
$sql->execute();
$res = $sql->fetchAll();

foreach ($res as $row) {
    $id= $row['id'];
    $libelle = $row['libelle'];
    $prix=$row["prix"] ;
    $quantite=$row["quantite"] ;
}
?>
<div class="container">

<h1 class="text-center my-5">Formulaire de modification des Produits</h1>
<form action="../Controllers/ProduitController.php" method="POST">
    <input type="hidden" name="id" value="<?php echo $id;?>"/>
    <div class="form-group">
        <label for="labelle-input">Libelle</label>
        <input type="text" value="<?php echo $libelle;?>" class="form-control mb-3" name="libelle" id="labelle-input" >
    </div>
    <div class="form-group">
        <label for="prix-input">Prix</label>
        <input type="number" value="<?php echo $prix;?>"  class="form-control mb-3" name="prix" id="prix-input" >
    </div>
    <div class="form-group">
        <label for="Qte-input">Quantité</label>
        <input type="number" value="<?php echo $quantite;?>" class="form-control mb-3" name="quantite" id="Qte-input" >
    </div>
    <div>
        <button type="submit" name="validate" class="btn btn-dark mt-3" >Modifier</button>
        <a href="../Views/ListProduits.php" class="btn btn-dark mt-3">Retour</a>
    </div>
</form>
</div>