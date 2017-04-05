<?php
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	} else {
		$uri = 'http://';
	}
	$uri .= $_SERVER['HTTP_HOST'];
	header('location: '.$uri.'/sumber-jaya-sakti/access/');
	exit;
?>
Something is wrong with the XAMPP installation :-(
