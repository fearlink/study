<?php require_once "core/functions.php"; ?>
<div class="container flex-sm-row flex-lg-column">
    <form action="<?= $_SERVER['REQUEST_URI']; ?>" method="post">
        <h2 class="navbar-text navbar-right">Очистить логи</h2>
        <input type="submit" class="btn btn-danger btn-md navbar-right" onclick="<?php ClrLogs(); ?>" value="Очистить">
    </form>
</div>
<?= drawLogs(); ?>
<?php getLogs(); ?>

