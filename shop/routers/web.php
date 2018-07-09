<?php
return [
    '/shop/' => [
        'method' => 'get|post',
        'target' => 'HomeControler@index',
        'middleware' => 'security',
        ],
];