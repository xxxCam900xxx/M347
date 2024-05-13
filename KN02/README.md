# KN02
[KN02.pdf](/KN02/Content/KN02.pdf)

# A) Dockerfile I

[dockerfile](/KN02/Content/dockerfile)
```dockerfile
# Verwenden des offiziellen Nginx-Images als Basis
FROM nginx

# Setzen des Arbeitsverzeichnisses im Container
WORKDIR /usr/share/nginx/html

# Kopieren der HTML-Datei ins Arbeitsverzeichnis (ohne absoluten Pfad)
COPY helloworld.html .

# Exponieren des Ports 80
EXPOSE 80`
```

### Notwendige Docker Befehle
``` Bash
 docker tag kn02a cameronmeile/m347:kn02a
 docker build -t cameronmeile/m347:kn02a .
 docker push cameronmeile/m347:kn02a
 docker run -p 8888:80 cameronmeile/m347:kn02a
``` 

![](/KN02/Content/Port8888.png)
![](/KN02/Content/ImagePort8888.png)


# B) Dockerfile II

### Telnet Befehl
![](/KN02/Content/Telnet.png)

### DB - Dockerfile
```dockerfile
# Neustes Mariadb Image verwenden
FROM mariadb:latest 

# Definiert variabel um Root Passwort festzulegen
ENV MARIADB_ROOT_PASSWORD="123" 

# Standartport für Mariadb
EXPOSE 3306 
```
#### Commands:
```bash
docker build -t kn02b-db .
docker run -d -p 3306:3306 --name kn02b_db kn02b-db
```

![](/KN02/Content/dbinfo.png)

### WEB - Dockerfile
```dockerfile
# Legt fest das Apache als Webserver verwendet wird
FROM php:8.0-apache 
 
# installiert mysqli
RUN docker-php-ext-install mysqli 
# Kopiert info.php in /var/www/html/ rein
COPY info.php /var/www/html/ 
# kopiert db.php in /var/www/html/ rein
COPY db.php /var/www/html/ 

# unnötig, weil Apache standardmässig auf 80 läuft
EXPOSE 8080 
```
#### Commands:
```bash
docker build -t kn02b-web .
docker run -d -p 80:80 --name kn02b_web --link kn02b_db kn02b-web
```

![](/KN02/Content/phpinfo.png)

### Angepasste php files
[db.php](/KN02/Content/WEB/db.php)
[info.php](/KN02/Content/WEB/info.php)