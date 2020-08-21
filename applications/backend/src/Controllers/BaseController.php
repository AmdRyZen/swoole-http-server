<?php
/*
|--------------------------------------------------------------------------
| $this->db->discard()
|--------------------------------------------------------------------------
|
| This value is the name of your application. This value is used when the
| framework needs to place the application's name in a notification or
| any other location as required by the application or its packages.
|
*/

namespace Backend\Controllers;

class BaseController
{
   /* public $db = null;

    public $payload = null;

    public function __construct()
    {
        $this->db = \app()->dbPool->getConnection();
        try {
            $this->payload = \app()->auth->getPayload();
        } catch (\Throwable $e) {
            $this->payload = [];
        }
    }

    public function __destruct()
    {
        $this->db->release();
    }*/
}
