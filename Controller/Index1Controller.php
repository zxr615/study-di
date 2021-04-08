<?php

namespace Study\Di;

use Study\Di\Services\UserService;

include "Services/UserService.php";
/**
 * IoC 控制反转
 *  控制：谁控制谁创建对象
 *  反转：创建对象的控制权转移
 * Di 依赖注入
 *  依赖：谁依赖谁
 *  注入：
 * Container 容器
 */
class Index1Controller
{
    public $userService;

    public function __construct()
    {
        /**
         * 因为我需要(依赖) UserService() 给我提供数据, 所以创建了一个 UserService() 对象，
         * 控制：我 (IndexController) 控制了 UserService() 对象的创建
         * 反转：我 (IndexController) 绝对控制 UserService() 对象的权利，创建对象的控制权没有发生转移，所以没有反转，一切都是亲力亲为。
         */
        $this->userService = new UserService();
    }

    public function index()
    {
        /**
         * 在方法中创建对象
         * 我 (index) 控制了 UserService() 对象的创建
         */
        $userService = new UserService();
        $userName  = $userService->getUserName();


        $userName2 = $this->userService->getUserName();

        return [$userName, $userName2];
    }
}