
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for t_video
-- ----------------------------
DROP TABLE IF EXISTS `t_video`;
CREATE TABLE `t_video` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(64) NOT NULL DEFAULT '' COMMENT '点播名称',
  `match_name` varchar(64) NOT NULL DEFAULT '' COMMENT '海盗直播比赛名称',
  `home_team` varchar(64) NOT NULL DEFAULT '' COMMENT '主队',
  `away_team` varchar(64) NOT NULL DEFAULT '' COMMENT '客队',
  `compet_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP COMMENT '比赛时间',
  `sport_id` int(11) NOT NULL DEFAULT '0' COMMENT '运动ID',
  `sport_name` varchar(64) NOT NULL DEFAULT '' COMMENT '运动name',
  `region_id` int(11) NOT NULL DEFAULT '0' COMMENT '地区ID',
  `region_name` varchar(64) NOT NULL DEFAULT '' COMMENT '地区name',
  `league_id` int(11) NOT NULL DEFAULT '0' COMMENT '联赛ID',
  `league_name` varchar(64) NOT NULL DEFAULT '' COMMENT '联赛name',
  `open_match_id` int(11) NOT NULL DEFAULT '0' COMMENT '直播中心比赛ID',
  `good_ball_match_id` int(11) NOT NULL DEFAULT '0' COMMENT '爱球比赛ID',
  `data_center_match_id` int(11) NOT NULL DEFAULT '0' COMMENT '数据中心比赛ID',
  `status` tinyint(3) NOT NULL DEFAULT '1' COMMENT '1 上线 2 下线 3 删除',
  `type` tinyint(3) NOT NULL DEFAULT '1' COMMENT '1 截取 2 手动上传',
  `logo` varchar(256) NOT NULL DEFAULT '' COMMENT '封面',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4 COMMENT '海盗点播 主表';

