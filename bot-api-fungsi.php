<?php


function apiRequest($method, $data)
{
	if (!is_string($method)) {
    	error_log("Nama method harus bertipe string!\n");
    	return false;
  	}

  	if (!$data) {
    	$data = array();
  	} else if (!is_array($data)) {
    	error_log("Data harus bertipe array\n");
    	return false;
  	}


    $url =  "https://api.telegram.org/bot" . $GLOBALS['token'] . "/". $method;

    $options = array(
        'http' => array(
            'header'  => "Content-type: application/x-www-form-urlencoded\r\n",
            'method'  => 'POST',
            'content' => http_build_query($data),
        ),
    );
    $context  = stream_context_create($options);

    $result = file_get_contents( $url, false, $context);

    return $result;

}



?>