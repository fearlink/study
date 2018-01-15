<?php
session_start();
if ( isset( $_SESSION['delete_user'] ) ) {
	unset( $_SERVER['PHP_AUTH_USER'] );
	unset( $_SERVER['PHP_AUTH_PW'] );
	$_SESSION['delete_user'] = null;
}
$valid_passwords = array( "admin" => "1111" );
$valid_users     = array_keys( $valid_passwords );

$user = isset( $_SERVER['PHP_AUTH_USER'] ) ? $_SERVER['PHP_AUTH_USER'] : null;
$pass = isset( $_SERVER['PHP_AUTH_PW'] ) ? $_SERVER['PHP_AUTH_PW'] : null;

$validated = ( in_array( $user, $valid_users ) ) && ( $pass == $valid_passwords[ $user ] );

if ( ! $validated ) {
	header( 'WWW-Authenticate: Basic realm="My Realm"' );
	header( 'HTTP/1.0 401 Unauthorized' );
	die ( "Not authorized" );
}