<?php
session_start();
require_once 'core/functions.php';
require_once 'core/data.php';
ob_start();
$action = ( isset( $_GET['action'] ) ) ? $_GET['action'] : 'index';
require_once "core/ceo.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title><?= $pageTitle ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css"/>
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault"
            aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarsExampleDefault">
		<?= drawMenu( $menu ); ?>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<?php if ( isAdmin() ): ?>
    <h1 class="alert alert-success">Режим бога</h1>
<?php endif ?>

<!-- Main jumbotron for a primary marketing message or call to action -->
<?php if ( $showJumbotron ): ?>
    <div class="jumbotron">
        <div class="container">
            <h1 class="display-3" style="color: <?= $titleColor ?>"><?= $greet ?></h1>
            <p>This is a template for a simple marketing or informational website. It includes a large callout called a
                jumbotron and three supporting pieces of content. Use it as a starting point to create something more
                unique.</p>
            <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
        </div>
    </div>
<?php else: ?>
    <div class="container">
        <h1 class="display-3" style="color: <?= $titleColor ?>"><?= $greet ?></h1>
    </div>
<?php endif; ?>
<div class="container">
    <div class="row">
        <div class="col-md-3">
			<?= drawMenu( $menu, true ) ?>
        </div>
        <div class="col-md-9">
			<?php include $include; ?>
        </div>
    </div>
    <hr>

    <footer>
        <p>&copy; Company <?= date( 'Y' ); ?></p>
    </footer>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
	<?php include "views/parts/flash.html.php"; ?>
</div> <!-- /container -->
</body>
</html>
