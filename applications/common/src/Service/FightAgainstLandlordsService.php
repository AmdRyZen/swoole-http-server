<?php
/*
|--------------------------------------------------------------------------
| FightAgainstLandlordsService
|--------------------------------------------------------------------------
|
| This value is the name of your application. This value is used when the
| framework needs to place the application's name in a notification or
| any other location as required by the application or its packages.
|
*/
namespace Common\Service;

final class FightAgainstLandlordsService
{
	use BaseService;

    public static function test() 
    {
        $data = [];
        // 准备一副牌 按牌大小排列
        $arr = $arr1 =  [
            '大王','小王',
            '方片2','梅花2','红心2','黑桃2',
            '方片A','梅花A','红心A','黑桃A',
            '方片K','梅花K','红心K','黑桃K',
            '方片Q','梅花Q','红心Q','黑桃Q',
            '方片J','梅花J','红心J','黑桃J',
            '方片10','梅花10','红心10','黑桃10',
            '方片9','梅花9','红心9','黑桃9',
            '方片8','梅花8','红心8','黑桃8',
            '方片7','梅花7','红心7','黑桃7',
            '方片6','梅花6','红心6','黑桃6',
            '方片5','梅花5','红心5','黑桃5',
            '方片4','梅花4','红心4','黑桃4',
            '方片3','梅花3','红心3','黑桃3',
        ];
        foreach ($arr as $k => $v) {
            $index = mt_rand(0,54 - $k -1);
            $key = array_search($arr1[$index], $arr);
            $cards[$key] = $arr1[$index];
            unset($arr1[$index]);
        $arr1 = array_values($arr1);
            # code...
        }
        $landowner = ['user1', 'user2', 'user3'];
        $lk = mt_rand(0,2);
        // 本轮地主 是哪个用户
        $data['landowner'] = $landowner[$lk];

        // 本轮地主多的3张牌
        $data['landowner+3'] = FightAgainstLandlordsService::getInstance()->licensing($cards, 0 , 3);
        
        // 用户
        $data['user1'] = FightAgainstLandlordsService::getInstance()->licensing($cards, 3 , 17);

        $data['user2'] = FightAgainstLandlordsService::getInstance()->licensing($cards, 20 , 17);

        $data['user3'] = FightAgainstLandlordsService::getInstance()->licensing($cards, 37 , 17);
        
        // 地主合牌
        $landowner = $data[$data['landowner']] + $data['landowner+3'];
        ksort($landowner);
        $data[$data['landowner']] = $landowner;

    	return $data;
    }

    public static function licensing($cards = [],$start = 0 , $end = 1)
    {
        $sort_cards = array_slice($cards, $start, $end, true);
        ksort($sort_cards);
        return $sort_cards;
    }
         
}