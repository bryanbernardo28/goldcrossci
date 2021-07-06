<?php

$json = file_get_contents('127.0.0.1:5000');
$data = json_decode($json);
echo $data->{'token'};

?>