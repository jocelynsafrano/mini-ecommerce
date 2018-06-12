<?php
$root = (!empty($_SERVER['HTTPS']) ? 'https' : 'http') . '://' . $_SERVER['HTTP_HOST'] . '/';
define('ROOT_URL', $root);
require('../sdk/genos/config-genos.php');