<!DOCTYPE html>
<html lang="en">
<head>
    <?php 
    require_once(dirname(__FILE__)."/../inc/head.php");
    ?> 
    <title>Ajout produit</title>
</head>
<body>
    <div class="container">

        <h1 class="text-center my-5">Formulaire d'ajout Produit</h1>
        <form action="../Controllers/ProduitController.php" method="POST">
            <div class="form-group">
                <label for="labelle-input">Libellé</label>
                <input type="text" class="form-control mb-3" name="libelle" id="labelle-input" >
            </div>
            <div class="form-group">
                <label for="prix-input">Prix</label>
                <input type="number" class="form-control mb-3" name="prix" id="prix-input" >
            </div>
            <div class="form-group">
                <label for="Qte-input">Quantité</label>
                <input type="number" class="form-control mb-3" name="quantite" id="Qte-input" >
            </div>
            <div>
                <button type="submit" name="validate" class="btn btn-dark mt-3" >Ajouter</button>
                <a href="../Views/ListProduits.php" class="btn btn-dark mt-3">Retour</a>
            </div>
        </form>
    </div>
</body>
</html>