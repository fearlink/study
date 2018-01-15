<?php

define( 'INSTA_FILE_NAME', 'insta.db' );
mysqli_report( MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT );
$db = mysqli_connect( 'localhost', 'root', '', 'study' );

$greet         = 'Доброй ночи';
$hour          = (int) date( 'H' );
$titleColor    = '#369';
$pageTitle     = '';
$include       = '';
$showJumbotron = false;

$menu = [
	[ 'href' => '/index.php', 'anchor' => 'Домой' ],
	[ 'href' => '/index.php?action=table', 'anchor' => 'Таблица' ],
	[ 'href' => '/index.php?action=logs', 'anchor' => 'Логи' ],
	[ 'href' => '/index.php?action=page', 'anchor' => 'Страница' ],
	[ 'href' => '/index.php?action=info', 'anchor' => 'PHP-info' ],
	[ 'href' => '/index.php?action=insta', 'anchor' => 'Инстаграм' ],
];

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

if ( isAdmin() ) {
	$menu[] = [ 'href' => '/logout.php', 'anchor' => 'Выход' ];
} else {
	$menu[] = [ 'href' => '/login.php', 'anchor' => 'Вход' ];
}