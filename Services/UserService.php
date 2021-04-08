<?php

namespace Study\Di\Services;

include "AddrService.php";

class UserService
{
    public $addr;

//    public function __construct(AddrService $addrService)
//    {
//        $this->addr = $addrService;
//    }

    public function getUserName()
    {
        return "zhangsan";
    }
}