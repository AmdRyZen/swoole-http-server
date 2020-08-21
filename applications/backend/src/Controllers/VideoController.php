<?php
/*
|--------------------------------------------------------------------------
| Backend API
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

class VideoController extends BaseController
{
    /**
    * create
    *
    * @param 
    * @return mixd
    */
    public function actionCreate()
    {
        try {
            $post = json_decode( \app()->request->getRawBody() ,true);
            Validation::validate( $post, [
                "name" => "Required",
            ]);

            $data = VideoService::getInstance()->create( $post );
            
            // ...

            // 响应*/
            return ['code' => HttpCode::HTTP_OK, 'data' => $data, 'message' => 'ok'];
        } catch (\Throwable $e) {
            return ['code' => HttpCode::HTTP_ERROR, 'message' => $e->getMessage()];
        }
    }

    public function actionUpdate()
    {
        try {
            $post = json_decode( \app()->request->getRawBody() ,true);
            Validation::validate( $post, [
                "id" => "IntGe:0",
            ]);

            $data = VideoService::getInstance()->update( $post );
            
            // ...

            // 响应*/
            return ['code' => HttpCode::HTTP_OK, 'data' => $data, 'message' => 'ok'];
        } catch (\Throwable $e) {
            return ['code' => HttpCode::HTTP_ERROR, 'message' => $e->getMessage()];
        }
    }

    public function actionDetail()
    {
        try {
            $post = json_decode( \app()->request->getRawBody() ,true);
            Validation::validate( $post, [
                "id" => "IntGe:0",
            ]);

            $data = VideoService::getInstance()->detail( $post );
            
            // ...

            // 响应*/
            return ['code' => HttpCode::HTTP_OK, 'data' => $data, 'message' => 'ok'];
        } catch (\Throwable $e) {
            return ['code' => HttpCode::HTTP_ERROR, 'message' => $e->getMessage()];
        }
    }

    public function actionPlayAddressList()
    {
        try {
            $post = json_decode( \app()->request->getRawBody() ,true);
            Validation::validate( $post, [
                "id" => "IntGe:0",
            ]);

            $data = VideoService::getInstance()->playAddressList( $post['id'] );
            
            // ...

            // 响应*/
            return ['code' => HttpCode::HTTP_OK, 'data' => $data, 'message' => 'ok'];
        } catch (\Throwable $e) {
            return ['code' => HttpCode::HTTP_ERROR, 'message' => $e->getMessage()];
        }

    }
    public function actionPlayAddressAdd()
    {
        try {
            $post = json_decode( \app()->request->getRawBody() ,true);
            Validation::validate( $post, [
                "video_id" => "IntGe:0",
                "play_address" => "Required",
            ]);

            $data = VideoService::getInstance()->playAddressAdd( $post );
            
            // ...

            // 响应*/
            return ['code' => HttpCode::HTTP_OK, 'data' => $data, 'message' => 'ok'];
        } catch (\Throwable $e) {
            return ['code' => HttpCode::HTTP_ERROR, 'message' => $e->getMessage()];
        }
    }

    public function actionPlayAddressUpdate()
    {
        try {
            $post = json_decode( \app()->request->getRawBody() ,true);
            Validation::validate( $post, [
                "id" => "IntGe:0",
            ]);

            $data = VideoService::getInstance()->playAddressUpdate( $post );
            
            // ...

            // 响应*/
            return ['code' => HttpCode::HTTP_OK, 'data' => $data, 'message' => 'ok'];
        } catch (\Throwable $e) {
            return ['code' => HttpCode::HTTP_ERROR, 'message' => $e->getMessage()];
        }
    }

    public function actionList()
    {
        try {
            $post = json_decode( \app()->request->getRawBody() ,true);
            Validation::validate( $post, [
                "page_index" => "IntGe:0",
                "page_size" => "IntGeLe:1,50",
            ]);

            $data = VideoService::getInstance()->list( $post );
            
            // ...

            // 响应*/
            return ['code' => HttpCode::HTTP_OK, 'data' => $data, 'message' => 'ok'];
        } catch (\Throwable $e) {
            return ['code' => HttpCode::HTTP_ERROR, 'message' => $e->getMessage()];
        }
    }
}
