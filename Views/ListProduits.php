<!DOCTYPE html>
<html lang="en">
<head>
<?php 
    require_once(dirname(__FILE__)."/../inc/head.php");
    require_once(dirname(__FILE__)."/../Models/RepositoryProduit.php");
    ?> 
    <title>Liste de produits</title>
</head>
<body>
    <div class="container">
    <h1 class="text-center">Liste de produits</h1>
    <div class="container">
    <table class="table table-dark table-striped">
    <thead>
        <tr>
        <th scope="col">#</th>
        <th scope="col">Libelle</th>
        <th scope="col">Prix</th>
        <th scope="col">Quantité</th>
        <th scope="col">Modifier</th>
        <th scope="col">Supprimer</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $manager = new DaoProduit();
    $products = $manager->readProduit();
    foreach($products as $p){?>
        <tr>
        <th scope='row'><?php echo $p->getId()  ?></th>
        <td><?php echo $p->getLibelle()  ?></td>
        <td><?php echo $p->getPrix() ?></td>
        <td><?php echo $p->getQuantite() ?></td>
        <td><button class='btn btn-outline-secondary'><a class= 'text-white text-decoration-none' href='../Controllers/ProduitModidier.php?id="<?php echo $p->getId()  ?>" &libelle="<?php echo $p->getLibelle()  ?>" &prix="<?php echo $p->getPrix() ?>"&quantite="<?php echo $p->getQuantite() ?>"'> Modifier </a></button></td>
        <td><button class='btn btn-outline-secondary'><a class= 'text-white text-decoration-none' href='../controller/modifier.php?id="<?php echo $p->getId()  ?>" &libelle="<?php echo $p->getLibelle()  ?>" &prix="<?php echo $p->getPrix() ?>"&quantite="<?php echo $p->getQuantite() ?>"'> Supprimer </a></button></td>
        </tr>
        <?php
        }
    ?> 
    </div>

    
  </tbody>
</table>
<a class="my-4" href="../Form/FormProduit.php"> Ajouter un produit</a>
    </div>
</body>
</html>