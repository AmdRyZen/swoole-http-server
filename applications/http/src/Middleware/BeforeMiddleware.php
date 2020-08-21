<?php

namespace Http\Middleware;

use Mix\Core\Middleware\MiddlewareInterface;
use Http\Enumeration\HttpCode;
use Http\Enumeration\AdminUser;

/*
|--------------------------------------------------------------------------
| 检测登录
|--------------------------------------------------------------------------
|
| This value is the name of your application. This value is used when the
| framework needs to place the application's name in a notification or
| any other location as required by the application or its packages.
|
*/
class BeforeMiddleware implements MiddlewareInterface
{
    const ACTION = [
        //'Http\Controllers\AdminUserController\actionCreate',
    ];

    /**
     * 处理
     * @param callable $callback
     * @param \Closure $next
     * @return mixed
     */
    public function handle(callable $callback, \Closure $next)
    {
        // 添加中间件执行代码
        list($controller, $action) = $callback;


        // ...
        if( in_array(get_class($controller) . '\\' . $action, self::ACTION) ) {
            // 添加中间件执行代码
           /* try{
                $payload = \app()->auth->getPayload();
                if( $payload['type'] != AdminUser::type_admin ) {
                    return ['code' => HttpCode::HTTP_NO_AUTH, 'message' => '没有权限'];
                }
            }catch (\Throwable $e){
                // token解码失败
                return ['code' => HttpCode::HTTP_NO_LOGIN, 'message' => $e->getMessage()];
            }*/
        }
        // 执行下一个中间件 
        return $next();
    }

}
