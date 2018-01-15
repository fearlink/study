<?php
$id_com = $_GET['t'];
if ( isPost() ) {
	$message     = getRequest( 'body' );
	$fileName    = uniqid() . $_FILES['img']['name'];
	$from        = $_FILES['img']['tmp_name'];
	$error       = $_FILES['img']['error'];
	$instaFolder = 'insta';
	$fullPath    = $instaFolder . '/' . $fileName;
	$flashData   = [
		'message' => 'Файл не загружен',
		'type'    => 'error',
		'title'   => 'Ooops'
	];

	if ( ! $error ) {
		if ( move_uploaded_file( $from, $fullPath ) ) {
			$message  = mysqli_real_escape_string( $db, $message );
			$fullPath = mysqli_real_escape_string( $db, $fullPath );
			$sql      = "INSERT INTO Posts (path_img, post_img) VALUES('$fullPath', '$message')";
			mysqli_query( $db, $sql );
			$flashData = [
				'message' => 'Файл загружен',
				'type'    => 'success',
				'title'   => 'Грейт ворк'
			];
		}

		setFlash( 'flash', $flashData );
		goBack();
	}
}

$sql    = "SELECT * FROM Posts ORDER BY date_post DESC";
$images = mysqli_query( $db, $sql );
$images = mysqli_fetch_all( $images );


?>
<form action="<?= $_SERVER['REQUEST_URI'] ?>" method="post" enctype="multipart/form-data">
    <div class="form-group">
        <label for="body">Сообщение</label>
        <textarea name="body" class="form-control" id="body" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="img">Ваша Картинка</label>
        <input name="img" type="file" class="form-control-file" id="img" aria-describedby="fileHelp">
    </div>

    <button type="submit" class="btn btn-primary">запостить</button>
</form>
<hr>
<div class="row">
    <div class="col-md-12">
        <ul class="list-group">
			<?php foreach ( $images as $image ): ?>
				<?php list( $id, $path, $message, $time ) = $image; ?>
                <li class="list-group-item">
                    <img width="200px" height="200px" src="/<?= $path ?>" alt="">
                    <div><?= nl2br( $message ) ?></div>
                    <a target="" href="/?action=showthreads&t=<?= $id ?>">Комментарии(
						<?php $sql = "SELECT * FROM Comments WHERE id_com='$id'"; ?>
						<?php $commnum = mysqli_query( $db, $sql ); ?>
						<?php $commnum = mysqli_fetch_all( $commnum, MYSQLI_ASSOC ); ?>

						<?= count( $commnum ) ?>
                        )</a>
                </li>
			<?php endforeach; ?>
        </ul>
    </div>
</div>