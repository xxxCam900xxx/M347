# KN05

[KN05.pdf](./Content/KN05.pdf)

---

# A) Bind mounts (40%)

1. Liste der Befehle die notwendig waren, um Container mit Volumen zu starten.

Estellt und betreibt einen Docker-Container mit nginx-Image und bind mount:

``` docker run --name kn05a -p 8080:80 -v D:/01-Backup/01-LP01WIN10JS/05-Tbz/01-Module/E-Portfolio-TBZ/M347/KN05/Content/Jan/:/usr/share/nginx/html/kn05a -d nginx ```

Zugriff auf die Container-Shell über das Terminal und start von output.sh:

``` docker exec -it 4520f9995593 bash /usr/share/nginx/html/kn05a/output.sh```

![](./Content/Jan/1-container.png)
![](./Content/Jan/2-output.png)


2. Erstellen Sie einen Screencast, der den beschriebenen Prozess zeigt. Testen Sie Ihn aber erst, bevor Sie den Screencast erstellen (Link in Grundlagen-Teil).



---

# B) Volumes (30%)

1. Liste der Befehle die notwendig waren, um Container mit Volumen zu starten.



2. Erstellen Sie einen Screencast, der den beschriebenen Prozess zeigt. Testen Sie Ihn aber erst, bevor Sie den Screencast erstellen (Link in Grundlagen-Teil).




# C) Speicher mit docker compose (30%)

1. Auszug mit dem Befehl mount im ersten Container, der zeigt, dass alle drei Speichertypen hinzugefügt wurden.



2. Auszug mit dem Befehl mount im zweiten Container, der zeigt, dass der Speichertyp hinzugefügt wurde.



3. docker compose Datei (yaml).