<?php
require_once "core/functions.php";
getLogs();
$rows  = 10;
$cols  = 10;
$color = '#f60';

$histories = [];

if ( isset( $_COOKIE['history'] ) ) {
	$histories = unserialize( $_COOKIE['history'] );
}

if ( isPost() ) {
	$rows  = abs( (int) getRequest( 'rows', 10 ) );
	$cols  = abs( (int) getRequest( 'cols', 10 ) );
	$color = getRequest( 'color', '#369' );

	array_unshift( $histories, [
		'color' => $color,
		'cols'  => $cols,
		'rows'  => $rows,
		'time'  => time()
	] );

	setcookie( 'history', serialize( $histories ), 0x7FFFFFFF );
}
?>

<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
    <div class="row">
        <div class="col">
            <input type="text" class="form-control" placeholder="Ряды" name="rows">
        </div>
        <div class="col">
            <input type="text" class="form-control" placeholder="Колонки" name="cols">
        </div>
        <div class="col">
            <input type="color" class="form-control" name="color">
        </div>
        <div class="col">
            <input type="submit" class="form-control" value="Нарисовать">
        </div>
    </div>
</form>
<hr>
<?= drawTable( $rows, $cols, $color ); ?>

<?php if ( is_array( $histories ) && count( $histories ) ): ?>
    <table class="table table-bordered">
        <tr>
            <th>Колонки</th>
            <th>Ряды</th>
            <th>Цвет</th>
            <th>Время</th>
        </tr>
		<?php foreach ( $histories as $history ): ?>
            <tr>
                <td><?= $history['cols'] ?></td>
                <td><?= $history['rows'] ?></td>
                <td>
                    <div style="width:20px;height:20px;background-color:<?= $history['color'] ?>;"></div>
                </td>
                <td><?= date( 'd-m-y H:i:s', $history['time'] ) ?></td>
            </tr>
		<?php endforeach; ?>
    </table>
<?php endif; ?>
