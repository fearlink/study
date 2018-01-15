<?php

$names = [
	'Neo',
	'Morpheus',
	'Tank',
	'Trinity',
	'Dozer',
	'Smith'
];
header( 'Content-Type: application/json' );
echo json_encode( $names );