<?php

namespace Http\Controllers;

use Mix\Http\Message\Request\HttpRequestInterface;
use Mix\Http\Message\Response\HttpResponseInterface;

/**
 * Class IndexController
 * @package Http\Controllers
 * @author liu,jian <coder.keda@gmail.com>
 */
class IndexController
{

    /**
     * 默认动作
     * @return string
     */
    public function actionIndex(HttpRequestInterface $request, HttpResponseInterface $response)
    {
        return ['code' => 0, 'message' => 'Http'];

    	\Swoole\Coroutine::sleep(0.01);
    	$coroutine_num = \Swoole\Coroutine::stats()['coroutine_num'];
        return ['code' => 0, 'message' => 'Http', 'coroutine_num' =>$coroutine_num];
    }

}
