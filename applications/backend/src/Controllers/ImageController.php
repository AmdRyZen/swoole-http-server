<?php
/*
|--------------------------------------------------------------------------
| ImageController
|--------------------------------------------------------------------------
|
| This value is the name of your application. This value is used when the
| framework needs to place the application's name in a notification or
| any other location as required by the application or its packages.
|
*/

namespace Backend\Controllers;

use Common\Enumeration\HttpCode;
use WebGeeker\Validation\Validation;
use Common\Service\VideoService;

class ImageController extends BaseController
{
    /**
    * create
    *
    * @param 
    * @return mixd
    */
    public function actionUpload()
    {
        try {
          /*  $post = json_decode( \app()->request->getRawBody() ,true);
            Validation::validate( $post, [
                "name" => "Required",
                "logo" => "Required",
            ]);

            $data = VideoService::getInstance()->create( $post );
            
            // ...

            // 响应*/
            return ['code' => HttpCode::HTTP_OK, 'data' => $data, 'message' => 'ok'];*/
        } catch (\Throwable $e) {
            return ['code' => HttpCode::HTTP_ERROR, 'message' => $e->getMessage()];
        }
    }
}
