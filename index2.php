<?php

use Study\Di\Index2Controller;
use Study\Di\Services\UserService;

include "Controller/Index2Controller.php";
include "Services/UserService.php";

// __construct() 中创建 new UserService() 转移到了这里
$userService = new UserService();
// 将 $userService 传入(注入) controller 构造函数中
$rs = (new Index2Controller($userService))->index();
var_dump($rs);