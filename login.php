<?php

require_once "security.php";
require_once "core/functions.php";
session_start();

$_SESSION['admin'] = true;

goBack();