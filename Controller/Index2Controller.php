<?php

namespace Study\Di;

use Study\Di\Services\UserService;

class Index2Controller
{
    public $userService;

    /**
     * 因为我需要(依赖) UserService() 给我提供数据, 所以我需要接收一个 UserService 类型的参数
     * 把依赖从外部传入进来，把需要的依赖注入进来了，就是依赖注入
     *
     *  控制：调用者控制了 UserService() 对象的创建
     *  反转：我 (IndexController) 控制 UserService 创建的权利已经没有了(转移了)，那转移给谁了？这里的控制权转移给调用者了。
     */
    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $userName = $this->userService->getUserName();

        return $userName;
    }
}
