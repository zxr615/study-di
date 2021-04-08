<?php

/**
 * IoC 容器
 */
class Container
{
    // 在 laravel 中这个方法是 `make()`, 这里为了方便和常用的 new xxx() 理解，所以命名成了「自动注入的new」
    public static function autoInjectNew($className, $params = [])
    {
        $reflect = new \ReflectionClass($className);
        // 获取构造函数
        $construct = $reflect->getConstructor();

        // 保存实例化需要的参数
        $args = [];
        if ($construct) {
            /**
             * 获取构造函数的参数
             * array(2) {
             *  [0] => object(ReflectionParameter)#3 (1) {["name"]=> string(11) "userService"}
             *  [1] => object(ReflectionParameter)#4 (1) {["name"]=> string(3) "uid"}
             *  }
             */
            $consParams = $construct->getParameters();
            foreach ($consParams as $param) {
                $class = $param->getClass();
                // 判断参数是否是 class，如果是 class 的话
                if ($class) {
                    // $args[] = new $class->name();
                    // 如果这样处理依赖的的 UserService() 还有依赖的话则无法兼顾，所以需要递归处理

                    // demo 中这里就是 new Study\Di\Services\UserService()
                    $args[] = self::autoInjectNew($class->name);
                }
            }
        }

        // 合并参数
        $args = array_merge($args, $params);

        /**
         * Ioc 控制反转:
         *  控制：容器控制了对象的创建
         *  反转：创建对象的权利已经转移到了容器中来了，不再是 IndexController() 中的 __construct() 了。
         * DI 依赖注入:
         *  依赖：$args 保存了保存了需要那些依赖
         *  注入：把 $args 中的依赖作为参数传入(注入)，返回实例
         */
        // 相当于：$instance = new Index3Controller(new UserService)
        $instance = $reflect->newInstanceArgs($args);

        return $instance;
    }
}