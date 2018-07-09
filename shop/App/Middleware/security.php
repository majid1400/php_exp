<?php

class security extends \App\Middleware\BaseMiddlewares {

    function handel($request)
    {
        echo 'im mmmmmmmmm';
        return $request;
    }
}