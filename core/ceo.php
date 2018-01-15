<?php
switch ( $action ) {
	case 'index':
		$showJumbotron = true;
		$pageTitle     = $greet;
		$include       = 'views/index.html.php';
		break;
	case 'table':
		$greet     = 'Таблица умножения для новичков';
		$pageTitle = 'Таблица умножения';
		$include   = 'views/table.html.php';
		break;
	case 'logs':
		$greet     = 'Логиии';
		$pageTitle = 'Логи';
		$include   = 'views/logs.html.php';
		break;
	case 'page':
		$greet     = 'Страница';
		$pageTitle = 'Страница';
		$include   = 'views/page.html.php';
		break;
	case 'info':
		$greet     = 'Информация о PHP';
		$pageTitle = 'PHP-info';
		$include   = 'views/info.html.php';
		break;
	case 'insta':
		$greet     = 'Инстаграм';
		$pageTitle = 'Инстаграм';
		$include   = 'views/insta.html.php';
		break;
	case 'showthreads':
		$greet     = 'Комментарии';
		$pageTitle = 'Комментарии';
		$include   = 'views/comm.html.php';
		break;
}