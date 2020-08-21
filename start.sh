echo "============`date +%F' '%T`==========="

start()
{
 	sudo php bin/mix-httpd start -c ./applications/http/config/httpd.php -d -u
	sudo php bin/mix-httpd start -c ./applications/backend/config/httpd.php -d -u
}
stop()
{
	sudo php bin/mix-httpd stop -c ./applications/http/config/httpd.php
	sudo php bin/mix-httpd stop -c ./applications/backend/config/httpd.php
}

case "$1" in
  start)
    start
    ;;
  stop)
    stop
    ;;
esac



#sudo php swoolefor.phar --exec="/usr/local/bin/php /Users/huzhichao/Desktop/stefano/github/mix-2.2.0/bin/mix.php api" --no-inotify
#!/usr/bin/env bash
# cpu_num=$(cat /proc/cpuinfo | grep processor | wc -l);
# cpu_num=$(sysctl hw.physicalcpu | awk '{print $2}');
# for ((i=0; i<cpu_num;i++))
# do
#     php bin/mix.php api --port=9509 -r -d
# done
# echo "启动成功，启动了{$cpu_num}个进程";




# process_list=$(ps -ef | grep bin/mix.php | grep -v grep |  awk '{print $2}')
# if [ "$process_list" = "" ]
# then
#      echo "服务器未启动！~"
# else
#    ps -ef | grep bin/mix.php | grep -v grep |  awk '{print $2}' | xargs kill
#    echo "服务停止成功"
# fi
