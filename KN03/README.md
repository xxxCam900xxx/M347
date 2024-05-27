# KN03 - Netzwerk, Sicherheit

# A) Eignenes Netzwerk (100%)

Verwenden Sie die Befehle um die Unterschiede und Gemeinsamkeiten in den Netzwerken zu finden:

Zuerst erstelle ich das benutzerdefinierte Netzwerk "tbz", "bridge ist pre-defined":

```bash
docker network create -d tbz
```

### 1. Welche IP-Adressen haben busybox1, busybox2, busybox3 und busybox4 erhalten? Diese Aufgabe können Sie auch mit docker inspect lösen

```bash

```

### 2. Starten Sie eine interaktive Session auf busybox1 und geben Sie folgende Befehle ein, resp. finden Sie die korrekten Befehle:

1. Welcher Default-Gateway ist eingetragen? Welcher Container hat den gleichen?

2. ping busybox2

3. ping busybox3

4. ping IP-von-busybox2

5. ping IP-von-busybox3

### 3. Starten Sie eine interaktive Session auf busybox3 und geben Sie folgende Befehle ein:

1. Welcher Default-Gateway ist eingetragen? Welcher Container hat den gleichen?

2. ping busybox1

3. ping busybox

4. ping IP-von-busybox1

5. ping IP-von-busybox4

---

### Erklären Sie die Gemeinsamkeiten und Unterschiede. Wie kommen die Zustande und was ist Ihre Schlussfolgerung

**Gemeinsamkeiten:**
Beide Netze, das Standard-Bridge-Netz und das benutzerdefinierte "tbz"-Netz, ermöglichen die Kommunikation zwischen Containern, die in dasselbe Netzsegment (Subnetz) eingebunden sind.
    
**Unterschiede:**
Der Unterschied besteht darin, dass die Container mit dem Standard-Bridge-Netzwerk nur teilweise verbunden sind, nämlich nur über die IP-Adresse, die sich im Laufe der Zeit ändern kann. Wenn ich jedoch mein eigenes Netzwerk erstelle, kann ich Containernamen verwenden, die sich im Laufe der Zeit nicht ändern.

---

### Betrachten Sie nun KN02
In KN02, the containers in the same gateway could not communicate via the container name but with the (--link), the name is linked with the IP address, which enables the container to communicate.

#### In welchem Netzwerk befanden sich die beiden Container?
    - busybox1: bridge
    - busybox3: tbz

#### Wieso konnten die miteinander reden?
The two containers that were located in the "tbz" network could talk to each other via their names or IP addresses because they were in the same network segment (subnet). Communication between containers in the same network is enabled by default and does not require any special configurations.