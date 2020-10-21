<?php

use Symfony\Component\ErrorHandler\Debug;
use Symfony\Component\HttpFoundation\Request;

require __DIR__ . '/../bootstrap.php';

if ($_SERVER['APP_DEBUG']) {
    umask(0000);

    Debug::enable();
}
try {
    $kernel = new \Luxo\Kernel($_SERVER['APP_ENV'], (bool) $_SERVER['APP_DEBUG']);
    $request = Request::createFromGlobals();
    $response = $kernel->handle($request);
    $response->send();
    $kernel->terminate($request, $response);

}catch (\Exception $e)
{
    dump($e);
}
