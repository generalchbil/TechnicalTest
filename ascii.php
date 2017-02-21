#!/usr/bin/php -q
<?php

if(isset($argv[1]) && strlen($argv[1])) {
	$string = $argv[1];
}else {
	echo 'Please Specify a String';
	exit(1);
}
