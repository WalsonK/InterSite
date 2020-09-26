<!doctype html>
<html lang="fr">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!--Custom css-->
    <link rel="stylesheet" href="../css/style.css">

    <title>Inter CMS - Login</title>
</head>

<body>
    <?php require 'header/header.php' ?>
    <?php require 'include/menu.php' ?>
    <main>
        <h1 class="block pl-2">Produits</h1>
        <div class="card optionsBlock">
            <div class="card-body">
                <div class="row">
                    <h5 class="card-title pl-2">Tous (24)</h5>
                    <form class="form-inline my-2 my-lg-0 searchBar">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                        <button class="btn btn-primary my-2 my-sm-0" type="submit">Search</button>
                    </form>
                </div><br>



                <div class="btn-group">
                    <button type="button" class="btn btn-outline-danger dropdown-toggle mr-5" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Filtrer
                    </button>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <a class="dropdown-item" href="#">Something else here</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Separated link</a>
                    </div>
                </div>
                <a href="#" class="btn btn-primary mx-5">Ajouter le produit</a>
                <a href="#" class="btn btn-primary mx-5">Modifier le produit</a>
                <a href="#" class="btn btn-primary ml-5">Supprimer le produit</a>
            </div>
        </div>
    </main>
    <?php require 'footer/footer.php' ?>
</body>

</html>