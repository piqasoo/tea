<?php
	$path = public_path('../') . 'resources/lang/ka/ka.json';
	$fileContent = file_get_contents($path);
    $data = json_decode($fileContent,true);

    if(isset($data['texts'])){
    	return $data['texts'];
    }