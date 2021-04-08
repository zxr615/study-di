<?php

namespace Study\Di;

use Study\Di\Services\UserService;

require __DIR__ . "/../Services/UserService.php";

class Index3Controller
{
    protected $userService;

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
