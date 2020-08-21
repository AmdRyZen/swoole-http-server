
SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for t_video_play_address
-- ----------------------------
DROP TABLE IF EXISTS `t_video_play_address`;
CREATE TABLE `t_video_play_address` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `video_id` int(11) NOT NULL DEFAULT '0' COMMENT 'video_id',
  `play_address` varchar(256) NOT NULL DEFAULT '' COMMENT '视频播放地址',
  `status` tinyint(3) NOT NULL DEFAULT '2' COMMENT '播放地址是否有效 1有效 2 无效',
  `server_name` varchar(64) NOT NULL DEFAULT 'default' COMMENT 'server_name 如果是截取的视频 在那台服务器 如果是手动上传的 默认 default',
  `type` tinyint(3) NOT NULL DEFAULT '1' COMMENT '1 截取 2 手动上传',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `index_video_id` (`video_id`)
) ENGINE=InnoDB AUTO_INCREMENT=0 DEFAULT CHARSET=utf8mb4 COMMENT '海盗点播 视频播放地址';