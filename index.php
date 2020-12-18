<?php
$data = [
        'ip' => $_SERVER['REMOTE_ADDR'],
	'headers' => getallheaders(),
	'GET' => $_GET,
	'POST' => $_POST,
	'INPUT' => file_get_contents('php://input'),
	'datetime' => date('d-m-Y H:i:s'),
];

file_put_contents('requests.log', json_encode($data).PHP_EOL, FILE_APPEND);

