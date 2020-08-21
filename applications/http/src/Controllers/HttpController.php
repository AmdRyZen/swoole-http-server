<?php
/*
|--------------------------------------------------------------------------
| 后台用户管理中心 API
|--------------------------------------------------------------------------
|
| This value is the name of your application. This value is used when the
| framework needs to place the application's name in a notification or
| any other location as required by the application or its packages.
|
*/

namespace Http\Controllers;

use Common\Enumeration\HttpCode;
use WebGeeker\Validation\Validation;
use Common\Service\FightAgainstLandlordsService;

class HttpController extends BaseController
{
    /**
    * test
    *
    * @param 
    * @return mixd
    */
     public function actiontest()
    {
        try {
            // $post = json_decode( \app()->request->getRawBody() ,true);
            // Validation::validate( $post, [
            //     "name" => "Required",
            // ]);

            $data = FightAgainstLandlordsService::getInstance()->test();
            
            // ...

            // 响应*/
            return ['code' => HttpCode::HTTP_OK, 'data' => $data, 'message' => 'ok'];
        } catch (\Throwable $e) {
            return ['code' => HttpCode::HTTP_ERROR, 'message' => $e->getMessage(), 'line' => $e->getLine()];
        }
    }
}
