<?php
/*
|--------------------------------------------------------------------------
| 点播服务
|--------------------------------------------------------------------------
|
| This value is the name of your application. This value is used when the
| framework needs to place the application's name in a notification or
| any other location as required by the application or its packages.
|
*/
namespace Common\Service;

final class VideoService
{
	use BaseService;

	private static $table_video = 't_video';

	private static $table_video_play_address = 't_video_play_address';

	const STATUS = 1; // 有效

    const TYPE = 2; // 手动

    public static function create( $post = [] ) 
    {
    	$db = \app()->dbPool->getConnection();
    	
        $data['type'] = self::TYPE;
        if(!empty($post['name'])) $data['name'] = $post['name'];
        if(!empty($post['match_name'])) $data['match_name'] = $post['match_name'];
        if(!empty($post['home_team'])) $data['home_team'] = $post['home_team'];
        if(!empty($post['away_team'])) $data['away_team'] = $post['away_team'];
        if(!empty($post['compet_time'])) $data['compet_time'] = $post['compet_time'];
        if(!empty($post['sport_id'])) $data['sport_id'] = $post['sport_id'];
        if(!empty($post['sport_name'])) $data['sport_name'] = $post['sport_name'];
        if(!empty($post['region_id'])) $data['region_id'] = $post['region_id'];
        if(!empty($post['region_name'])) $data['region_name'] = $post['region_name'];
        if(!empty($post['league_id'])) $data['league_id'] = $post['league_id'];
        if(!empty($post['league_name'])) $data['league_name'] = $post['league_name'];
        if(!empty($post['open_match_id'])) $data['open_match_id'] = $post['open_match_id'];
        if(!empty($post['good_ball_match_id'])) $data['good_ball_match_id'] = $post['good_ball_match_id'];
        if(!empty($post['data_center_match_id'])) $data['data_center_match_id'] = $post['data_center_match_id'];
        if(!empty($post['status'])) $data['status'] = $post['status'];
        if(!empty($post['logo'])) $data['logo'] = $post['logo'];

        $success = $db->insert(self::$table_video, $data)->execute();
        $db->release();
      	return $success;
    }

    public static function update( $post = [] ) 
    {
    	$db = \app()->dbPool->getConnection();
    	if(!empty($post['name'])) $data['name'] = $post['name'];
        if(!empty($post['match_name'])) $data['match_name'] = $post['match_name'];
        if(!empty($post['home_team'])) $data['home_team'] = $post['home_team'];
        if(!empty($post['away_team'])) $data['away_team'] = $post['away_team'];
        if(!empty($post['compet_time'])) $data['compet_time'] = $post['compet_time'];
        if(!empty($post['sport_id'])) $data['sport_id'] = $post['sport_id'];
        if(!empty($post['sport_name'])) $data['sport_name'] = $post['sport_name'];
        if(!empty($post['region_id'])) $data['region_id'] = $post['region_id'];
        if(!empty($post['region_name'])) $data['region_name'] = $post['region_name'];
        if(!empty($post['league_id'])) $data['league_id'] = $post['league_id'];
        if(!empty($post['league_name'])) $data['league_name'] = $post['league_name'];
        if(!empty($post['open_match_id'])) $data['open_match_id'] = $post['open_match_id'];
        if(!empty($post['good_ball_match_id'])) $data['good_ball_match_id'] = $post['good_ball_match_id'];
        if(!empty($post['data_center_match_id'])) $data['data_center_match_id'] = $post['data_center_match_id'];
        if(!empty($post['status'])) $data['status'] = $post['status'];
        if(!empty($post['logo'])) $data['logo'] = $post['logo'];

        $where = [
            ['id', '=', $post['id']],
        ];
        $success = $db->update(self::$table_video, $data, $where)->execute();
        $db->release();
        return $success;
    }

    public static function detail( $post = [] ) 
    {
        $db = \app()->dbPool->getConnection();
        $table_video = self::$table_video;

        $sql = "SELECT * FROM $table_video WHERE id =:id";
        $detail = $db->prepare($sql)->bindParams([
            'id' => $post['id'] ?? 0,
        ])->queryOne();
       
        $db->release();
        return $detail;
    }

    public static function playAddressList( $ids = [] )
    {
        $db = \app()->dbPool->getConnection();
        $table_video_play_address = self::$table_video_play_address;

        $sql = "SELECT * FROM $table_video_play_address WHERE status IN (:status) AND video_id IN (:video_id)";
        $list = $db->prepare($sql)->bindParams([
            'status' => [1],
            'video_id' => $ids,
        ])->queryAll();
       
        $db->release();
        return ['list' =>  $list];
    }

    public static function playAddressAdd( $post = [] ) 
    {
        $db = \app()->dbPool->getConnection();
        
        $data['video_id'] = $post['video_id'];
        $data['play_address'] = $post['play_address'];
        $data['status'] = self::STATUS;
        $data['type'] = self::TYPE;
        $success = $db->insert(self::$table_video_play_address, $data)->execute();
        $db->release();
        return $success;
    }

    public static function playAddressUpdate( $post = [] )
    {
        $db = \app()->dbPool->getConnection();
        if(!empty($post['play_address'])) $data['play_address'] = $post['play_address'];
        if(!empty($post['status'])) $data['status'] = $post['status'];

        $where = [
            ['id', '=', $post['id']],
        ];
        $success = $db->update(self::$table_video_play_address, $data, $where)->execute();
        $db->release();
        return $success;
    }

    public static function list( $post = [] )
    {
    	$db = \app()->dbPool->getConnection();
    	$table_video = self::$table_video;

    	$offset = ($post['page_index'] - 1 ) * $post['page_size'];
    	$page_size = $post['page_size'];
    	$where = " status IN (:status) "; 
    	if($post['name'])  $where  .= " AND name LIKE :name ";

    	$sql = "SELECT count(1) as total FROM $table_video WHERE $where ";
    	$total = $db->prepare($sql)->bindParams([
    		'status' => [1],
    		'name' => '%' . $post['name'] .'%'
    	])->queryOne();

    	$sql = "SELECT * FROM $table_video WHERE $where ORDER BY id DESC LIMIT $page_size OFFSET $offset";
        $list = $db->prepare($sql)->bindParams([
        	'status' => [0,1],
            'name' => '%' . $post['name'] .'%'
        ])->queryAll();

        $ids = array_column($list, 'id');
        $play_address = [];
        if(!empty($ids)) {
            $play_address_list = VideoService::getInstance()->playAddressList( $ids );
            foreach ($play_address_list['list'] as $key => $value) {
                $play_address[$value['video_id']] = $value;
            }
            unset($play_address_list);
        }
        foreach ($list as &$item) {
            $item['play_address'] = $play_address[$item['id']]['play_address'] ?? '';
        }

        $db->release();
      	return ['total' => $total['total'], 'list' => $list];
    }
}