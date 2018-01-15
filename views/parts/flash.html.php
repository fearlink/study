<?php if ( hasFlash( 'flash' ) ): ?>
	<?php $flashData = getFlash( 'flash' ); ?>
    <script>
        swal('<?= $flashData['title'] ?>', '<?= $flashData['message'] ?>', '<?= $flashData['type'] ?>   ');
    </script>
<?php endif; ?>


