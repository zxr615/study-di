<?php

use Study\Di\Index3Controller;

include "Controller/Index3Controller.php";
include "Container.php";


$index3Instance = Container::autoInjectNew(Index3Controller::class);
$rs = $index3Instance->index();
var_dump("indexRs: ", $rs);

// 使用助手函数
$appRs = app(Index3Controller::class)->index();
var_dump("appRs: ", $appRs);

// 助手函数
function app($class, $params = []) {
    return Container::autoInjectNew($class, $params);
}