<?php
require_once 'core/data.php';
require_once 'core/functions.php';
$id_com = $_GET['t'];

if ( isPost() ) {
	$message = $_POST['txtcom'];
	$sql     = "INSERT INTO Comments (id_com, comm_fp) VALUES('$id_com', '$message')";
	mysqli_query( $db, $sql );
}
$sql    = "SELECT comm_fp FROM Comments WHERE id_com ='$id_com'";
$images = mysqli_query( $db, $sql );
$images = mysqli_fetch_all( $images );

?>

<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post">
    <div class="form-group">
        <label for="textcom">Комментарии</label>
        <textarea name="txtcom" class="form-control" id="textcom" rows="3"></textarea>
    </div>

    <button type="submit" class="btn btn-primary">добавить комментарий</button>
</form>

<hr>
<div class="row">
    <div class="col-md-12">
        <ul class="list-group">
			<?php foreach ( $images as $image ): ?>
				<?php list( $message ) = $image; ?>
                <li class="list-group-item">
                    <div><?= nl2br( $message ) ?></div>
                </li>
			<?php endforeach; ?>
        </ul>
    </div>
</div>