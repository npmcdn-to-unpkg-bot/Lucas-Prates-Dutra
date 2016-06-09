<?php

include "model/Request.php";

class RequestController
{
    public function createRequest($protocol, $method, $uri, $server_addr)
    {
        $uri_array = explode("/", $uri);

        return new Request($protocol,
                           $method,
                           $uri_array[3],
                           $this->getParams($uri_array[4]),
                           $server_addr);
    }

    public function getParams($string_params)
    {

        $replace = str_replace("?", "", $string_params);

        $explode_params = explode("&", $replace);


        $params_map = array();

        foreach ($explode_params as $value) {
            $explode_key_value = explode("=", $value);

            $params_map[$explode_key_value[0]] = $explode_key_value[1];
        }

        return $params_map;
    }
}