<?php
$countryCounter = 0;
// 1. подключиться к базе
// 2. выбрать базу данных
$db = mysqli_connect( 'localhost', 'root', '', 'world' );
// $r = mysqli_select_db($db, 'world');
// 3. писать запросы (любое кол-во)
$sql = "SELECT ID, Name, District, CountryCode, Population FROM City";
if ( ! empty( $_GET['q'] ) ) {
	$q   = mysqli_real_escape_string( $db, $_GET['q'] );
	$sql .= " WHERE Name LIKE '%$q%'";
}

$result         = mysqli_query( $db, $sql );
$countryCounter = mysqli_num_rows( $result );
$allCountry     = mysqli_fetch_all( $result, MYSQLI_ASSOC );
/*$allCity = [];

while($row = mysqli_fetch_assoc($result)){
    $allCity[] = $row;
}
print_r($allCity);*/

// 4. закрыть соединение с базой
mysqli_close( $db );
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>Города (<?= $countryCounter ?>)</h1>
<form action="">
    <input type="text" name="q" value="<?= ( ! empty( $_GET['q'] ) ) ? $_GET['q'] : '' ?>">
    <button>искать</button>
</form>
<table border="1">
    <tr>
        <th>ID</th>
        <th>Name</th>
        <th>District</th>
        <th>CountryCode</th>
        <th>Population</th>
    </tr>
	<?php foreach ( $allCountry as $countryInfo ): ?>
        <tr>
            <td><?= $countryInfo['ID'] ?></td>
            <td><?= $countryInfo['Name'] ?></td>
            <td><?= $countryInfo['District'] ?></td>
            <td><?= $countryInfo['CountryCode'] ?></td>
            <td><?= $countryInfo['Population'] ?></td>
        </tr>
	<?php endforeach; ?>
</table>
</body>
</html>
