nginx-php7.2
==========
Build image
-----------

Run on container
-------------
```bash
sudo make run
```

# Commands

mysql --host=host.docker.internal -P 3308 --user=root --password=Nma-apl1 tomonews

# schedule
```
php artisan schedule:run
```

# DEBUG
file_put_contents('/var/www/html/log/log.txt',\Carbon\Carbon::now());

$myfile = fopen("/var/www/html/log/log.txt", "a") or die("Unable to open file!");
$txt = $pendingId;
fwrite($myfile, "\n". $txt);

# Cron
```
crontab -e
```

* * * * * env > /tmp/env.output
* * * * * cd /var/www/html && php artisan schedule:run >> /dev/null 2>&1

SHELL=/bin/bash 
PATH=/bin:/sbin:/usr/bin:/usr/sbin
* * * * * /bin/bash /var/www/html/cronjob.sh 2> /tmp/crontab_script_log.txt 2>&1

chmod +x /var/www/html/cronjob.sh

# ipaddress
```
hostname -I | awk '{print $1}'
hostname -i
```