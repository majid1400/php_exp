<?php

include "App/Core/Request.php";

$request = new \App\Core\Request();

var_dump($request);

echo "pageee: $request->page <br>";