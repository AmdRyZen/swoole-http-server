<?php
/*
|--------------------------------------------------------------------------
| 基础服务
|--------------------------------------------------------------------------
|
| This value is the name of your application. This value is used when the
| framework needs to place the application's name in a notification or
| any other location as required by the application or its packages.
|
*/
namespace Common\Service;

trait BaseService
{
	private static $_instance;

	public static function getInstance() 
	{
		if( !(self::$_instance instanceof static) ) {
			self::$_instance = new static;
		}
		return self::$_instance;
	}

	public function __clone() {}
}