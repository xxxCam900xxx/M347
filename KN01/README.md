# KN01
[KN01.pdf](/KN01/Content/KN01.pdf)

# A)

![](/KN01/Content/DockerWebsite.png)
![](/KN01/Content/DockerWebsite.png)

# B)

1. Docker version überprüfen
	**docker --version**
2. Docker search Befehle
	**docker search ubuntu**
	**docker search nginx**
3. Parameter Erklären
	**-d** (startet den container im Hintergrund)
	**-p 80:80** (Mappt Port 80 des Hosts auf Port 80 des Containers)
	docker/getting-started (Das verwendete Image)
4. Nginx Image 
	**docker pull nginx**
	**docker create -p 8081:80 --name mynginx nginx**
	**docker start mynginx**
	**http://localhost:8081**
    ![](/KN01/Content/Ngnix.png)
    ![](/KN01/Content/DockerMyNginx.png)
5. Ubuntu Image
	**docker run -d ubuntu**
Docker sucht das Image. Wenn das Image nicht gefunden wird, wird er auch nicht gestartet. Der Docker wird dann nicht ausgeführt. Mit dem Befehl **"Docker ps"** kann man den Status vom docker anschauen.
	**docker run -it ubuntu**
Mit dem **"-it"** Befehl öffnet man direkt das interactive terminal. Das interactive terminal ist in der shell im Container.
1. Nachträglich interactive shell starten
	**docker exec -it mynginx /bin/bash**
	**service nginx status**
2. status der docker
	**docker ps -a**
    ![](/KN01/Content/DockerStatus.png)
3. NGINX stoppen
	**docker stop mynginx**
4. Docker löschen
	**docker rm $(docker ps -a -q)**
	**docker rm 292f39ddca5ddfd9c1c664e06a15312955ed0d10ce25b04766757454bdffea57**
	**docker rm 35853a5fc26d24ff03713b9c93c2f519a9ee5c4bc8dc1216f2609bc46b0f3f81**
	**docker rm 9ab3f6aad513162b8525da5bd438f445195806e18418e17f7c144448eb5665fb**
5.  Images Entfernen
	**docker rmi nginx ubuntu**
 
# C)
![](/KN01/Content/DockerRepoCame.png)

# D)
1. Nginx Herunterladen
	**docker pull nginx:latest**
2. Nginx in das eigene repo kopieren
	**docker tag nginx:latest cameronmeile/m347:nginx**
3. MariaDb herunterladen
	**docker pull mariadb:latest**
4. MariaDb in das eigene repo kopieren
	**docker tag mariadb:latest cameronmeile/m347:mariadb**
5. Alles auf repo pushen
	**docker push cameronmeile/m347:nginx**
	**docker push cameronmeile/m347:mariadb**

![](/KN01/Content/DockerTags.png)
![](/KN01/Content/DockerHubTags.png)