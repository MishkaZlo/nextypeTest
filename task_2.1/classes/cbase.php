<?php

set_exception_handler(function ($exception) {
    echo "Exception: " . $exception->getMessage();
});

class CBase
{
    private static $params;
    private static $instance;

    private function __construct($params = false)
    {
        if (is_array($params))
            self::$params = $params;
    }

    private function __clone()
    {
    }
    
    public static function getInstance($params)
    {
        if (is_null(self::$instance)) {
            self::$instance = new self($params);
        }

        return self::$instance;
    }

    public static function getParam($property)
    {
        if (!is_null(self::$params) && isset(self::$params[$property]))
            return self::$params[$property];

        throw new Exception('Oops, there is no such property!');
    }

}
