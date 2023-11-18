**未完整遵守 PSR-12 標準**

[PSR-12：增修程式碼風格指南](https://github.com/memochou1993/PSR/blob/master/PSR-12.md)

```bash
# Build
docker build -t "my-php-image" .

# Run
docker run -dit -p 8080:8080 -v $(pwd):/app --name my-php-container my-php-image

# 重開
docker start my-php-container

# 關閉
docker stop my-php-container
```

[Example of PHP 7.2.x Docker image install with MS SQL Server extensions](https://gist.github.com/xenogew/3440d323b00e1d661966f2b2ca3ef64a)

[Create a Simple Captcha Script Using PHP](https://www.allphptricks.com/create-a-simple-captcha-script-using-php/)

[mysql/mysql-server - Docker Image | Docker Hub](https://hub.docker.com/r/mysql/mysql-server/)


```bash
docker run --name=my-sql-server -p 3306:3306 -d mysql/mysql-server

docker logs mysql1 2>&1 | grep GENERATED

docker exec -it mysql1 mysql -uroot -p

ALTER USER 'root'@'localhost' IDENTIFIED BY 'password';
```

```bash
# 允許外部訪問資料庫 https://stackoverflow.com/a/50197630
CREATE USER 'root'@'%' IDENTIFIED BY 'PASSWORD';

GRANT ALL PRIVILEGES ON *.* TO 'root'@'%' WITH GRANT OPTION;

FLUSH PRIVILEGES;
```

```bash
# 執行兩個
docker-compose up -d
# `-d` 在背景執行
```

```bash
# 取得 Docker container 的 IP
docker inspect \
  -f '{{range.NetworkSettings.Networks}}{{.IPAddress}}{{end}}' container_name_or_id
```

```bash
a2enmod rewrite
service apache2 restart
```

```bash
# 還要搭配原本的 Dockerfile
docker run --name php-apache -v $(pwd)/php/:/var/www/html/ -p 8081:80 php:8.0-apache
```