<?php
$greet      = 'Доброй ночи';
$hour       = (int) date( 'H' );
$titleColor = '#369';

if ( $hour >= 6 and $hour < 12 ) {
	$greet      = 'Доброе утро';
	$titleColor = 'green';
} else if ( $hour >= 12 and $hour < 18 ) {
	$greet      = 'Добрый день';
	$titleColor = 'gray';
} else if ( $hour >= 18 and $hour < 23 ) {
	$greet      = 'Добрый вечер';
	$titleColor = 'pink';
}

$rows  = 30;
$cols  = 30;
$color = '#f60';
$table = '';

$table .= "<table border=\"1\" class=\"table table-bordered\">";
for ( $tr = 1; $tr <= $rows; $tr ++ ) {
	$table .= "<tr>";
	for ( $td = 1; $td <= $cols; $td ++ ) {
		if ( $tr == 1 or $td == 1 ) {
			$table .= "<td style=\"background-color: $color;\">" . $tr * $td . "</td>";
		} else {
			$table .= "<td>" . $tr * $td . "</td>";
		}
	}
	$table .= "</tr>";
}
$table .= "</table>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Jumbotron Template for Bootstrap</title>
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
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Link</a>
            </li>
            <li class="nav-item">
                <a class="nav-link disabled" href="#">Disabled</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="http://example.com" id="dropdown01" data-toggle="dropdown"
                   aria-haspopup="true" aria-expanded="false">Dropdown</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                    <a class="dropdown-item" href="#">Action</a>
                    <a class="dropdown-item" href="#">Another action</a>
                    <a class="dropdown-item" href="#">Something else here</a>
                </div>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>

<div class="container">
    <!-- Example row of columns -->
    <div class="row">
        <div class="col-lg-12">
			<?= $table ?>
        </div>
    </div>

    <hr>

    <footer>
        <p>&copy; Company <?= date( 'Y' ); ?></p>
    </footer>
</div> <!-- /container -->
</body>
</html>
