<?php
/*
|--------------------------------------------------------------------------
| 公共处理
|--------------------------------------------------------------------------
|
| This value is the name of your application. This value is used when the
| framework needs to place the application's name in a notification or
| any other location as required by the application or its packages.
|
*/

namespace Common\Libraries;

class Handle
{
    /**
    * 无限极分类
    *
    * @param 
    * @return mixd
    */
    public static function limitlessClassification( $arr = [] ): array
    {
       //第一步 构造数据
        $items = $tree = [];
        array_walk($arr, function ( $value ) use ( &$items ) {
            $items[$value['id']] = $value;
        });
        //第二部 生成树状结构
        array_walk($items, function ( $value, $key ) use ( &$tree, &$items ) {
            if(isset($items[$value['parent_id']])){
                $items[$value['parent_id']]['children'][] = &$items[$key];
            }else{
                $tree[] = &$items[$key];
            }
        });
        return $tree;
    }
}
