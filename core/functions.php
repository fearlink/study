<?php

/**
 * @param $menu
 * @param bool $vertical
 *
 * @return string
 */
function drawMenu( $menu, $vertical = false ) {
	$ulClass = 'navbar-nav mr-auto';
	$liClass = 'nav-item';
	$html    = '';
	if ( $vertical ) {
		$ulClass = 'list-group';
		$liClass = 'list-group-item';
	}

	$html .= "<ul class=\"$ulClass\">";
	foreach ( $menu as $menuItem ) {
		$html .= "<li class=\"$liClass\">";
		$html .= "<a class=\"nav-link\" href=\"{$menuItem['href']}\">{$menuItem['anchor']}</a>";
		$html .= "</li>";
	}
	$html .= "</ul>";

	return $html;
}

/**
 * @param $rows
 * @param $cols
 * @param $color
 *
 * @return string
 */
function drawTable( $rows, $cols, $color ) {
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

	return $table;
}

/**
 * @return bool
 */
function isPost() {
	return $_SERVER['REQUEST_METHOD'] == 'POST';
}

/**
 * @param $key
 * @param null $default
 *
 * @return null
 */
function getRequest( $key, $default = null ) {
	return array_key_exists( $key, $_REQUEST ) ? $_REQUEST[ $key ] : $default;
}

/**
 * @return bool
 */
function isAdmin() {
	return ! empty( $_SESSION['admin'] );
}

function goBack() {
	$url = isset( $_SERVER['HTTP_REFERER'] ) ? $_SERVER['HTTP_REFERER'] : '/';

	header( 'Location: ' . $url );
	die;
}

function setFlash( $key, $value ) {
	$_SESSION['_flash_data_'][ $key ] = $value;
}

function hasFlash( $key ) {
	return array_key_exists( $key, $_SESSION['_flash_data_'] );
}

function getFlash( $key ) {
	$value = $_SESSION['_flash_data_'][ $key ];
	unset( $_SESSION['_flash_data_'][ $key ] );

	return $value;
}

function getBrowser() {
	global $br;
	$agent = $_SERVER['HTTP_USER_AGENT'];
	preg_match( "/(MSIE|Opera|Firefox|Chrome|Version)(?:\/| )([0-9.]+)/", $agent, $bInfo );
	$browserInfo            = [];
	$browserInfo['name']    = ( $bInfo[1] == "Version" ) ? "Safari" : $bInfo[1];
	$browserInfo['version'] = $bInfo[2];
	$br                     .= $browserInfo['name'];
	$br                     .= "/";
	$br                     .= $browserInfo['version'];

	return $br;
}

/**
 *
 */
function getLogs() {
	$method = $_SERVER['REQUEST_METHOD'];
	$url    = $_SERVER['REQUEST_URI'];
	$ip     = $_SERVER['REMOTE_ADDR'];
	$date   = date( 'd-m-y H:i', time() + $_SERVER['time'] - 3600 );
	$br     = getBrowser();

	if ( ! empty( $_SESSION['admin'] ) ) {
		$user = $_SERVER['PHP_AUTH_USER'];
	} else {
		$user = 'guest';
	}

	$data = [
		$user,
		$url,
		$method,
		$ip,
		$date,
		$br,
	];

	$f    = 'logs.txt';
	$data = serialize( $data );
	file_put_contents( $f, $data . "\r\n", FILE_APPEND );
}

function drawLogs() {
	$f    = 'logs.txt';
	$data = file( $f );

	$logs = '';
	$logs .= "<table class=\"table table-bordered\">";
	$logs .= "<tr><th>Пользователь</th><th>Страница</th><th>Метод</th><th>IP-адрес</th><th>Время</th>";
	$logs .= "<th>Браузер / Версия</th></tr>";

	foreach ( array_reverse( $data ) as $item ) {
		$logs .= "<tr>";
		$item = unserialize( $item );
		//print_r($item);
		for ( $i = 0; $i <= 5; $i ++ ) {
			$logs .= "<td>" . $item[ $i ] . "</td >";
		}
		$logs .= "</tr>";
	}
	$logs .= "</table>";

	return $logs;
}

function ClrLogs() {
	if ( $_SERVER['REQUEST_METHOD'] == 'POST' ) {
		file_put_contents( 'logs.txt', '' );
	}
}