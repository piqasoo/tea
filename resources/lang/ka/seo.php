<?php
	$path = public_path('../') . 'resources/lang/ka/ka.json';
	$fileContent = file_get_contents($path);
    $data = json_decode($fileContent,true);

    if(isset($data['seo'])){
        return $data['seo'];
    }