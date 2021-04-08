<?php

use Study\Di\Index3Controller;

include "Controller/Index3Controller.php";
include "Container.php";


$indexController = app(Index3Controller::class);
$rs = $indexController->index();
///** @var Index3Controller $index3Instance */
//$index3Instance = Container::autoInjectNew(Index3Controller::class);
//$index3Instance->index();

function app($class, $params = []) {
    return Container::autoInjectNew($class, $params);
}