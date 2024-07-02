# KN07

### A) Begriffe und Konzepte erlernen (40%)

####  Erklären Sie den Unterschied zwischen Pods und Replicas mit eigenen Worten.

- **Pods**: Ein Pod ist die kleinste ausführbare Einheit in Kubernetes. Es kann eine oder mehrere Container enthalten, die gemeinsam auf einem Knoten laufen und sich Ressourcen teilen. Ein **Pod** repräsentiert eine einzelne Instanz einer Anwendung oder eines Mikroservices.

- **Replicas**: *Eine Replica ist eine Kopie eines Pods*, die von einem Deployment oder einer ReplicaSet-Steuerung verwaltet wird. Replicas ermöglichen die *Skalierung von Anwendungen*, indem mehrere Instanzen eines Pods erstellt werden. Jede Replica kann denselben oder unterschiedlichen Pods entsprechen.

#### Erklären Sie den Unterschied zwischen Service und Deployment mit eigenen Worten. 

- **Service**: Ein Service in Kubernetes ist eine Abstraktion, die Pods als eine einzige Anwendungseinheit darstellt und ihnen einen stabilen Netzwerknamen und eine IP-Adresse zuweist. Services ermöglichen die Kommunikation zwischen verschiedenen Teilen einer Anwendung, unabhängig davon, auf welchen Knoten sie sich befinden.

- **Deployment**: Ein Deployment definiert den Zustand einer Anwendung oder eines Pods, einschließlich der Anzahl der Replikate, die laufen sollen, und des verwendeten Containerimages. Deployments verwalten Pods und ermöglichen das Skalieren, Aktualisieren und Rollbacken von Anwendungen.

#### Welches Problem löst Ingress? Beantworten Sie die Frage in eigenen Worten.

- **Ingress**: Ingress ist eine Kubernetes-Ressource, die den Zugriff auf Dienste innerhalb eines Kubernetes-Clusters von außen ermöglicht. Ingress löst das Problem der Bereitstellung von externem Zugriff auf Anwendungen, die in einem Kubernetes-Cluster laufen. Es ermöglicht die Steuerung des Datenverkehrs basierend auf HTTP- und HTTPS-Routen und kann für die Lastverteilung und SSL-Terminierung verwendet werden.

#### Für was ist ein statefulset? Beantworten Sie die Frage in eigenen Worten. Geben Sie ein mögliches Beispiel - aber keine Datenbank. 

- **StatefulSet**: Ein **StatefulSet** ist eine Kubernetes-Ressource, die für die Bereitstellung von zustandsbehafteten Anwendungen in einem Kubernetes-Cluster verwendet wird. Im Gegensatz zu Pods in Deployments sind die Pods in einem StatefulSet eindeutig identifizierbar und haben stabile Netzwerkidentitäten sowie persistente Speicherungen. Ein mögliches Beispiel für die Verwendung eines StatefulSets ist die Bereitstellung von NoSQL-Datenbanken wie Apache Cassandra oder MongoDB, bei denen jeder Pod einen eindeutigen Zustand hat und über eine eindeutige Identität innerhalb des Clusters verfügt.

### B) Demo Projekt (60%)

#### Command Lines

Escape Vim FIle
`esc -> : -> w -> q`

```bash

mkdir projektdemo

sudo snap -i kubectl --classic

touch configmap.yaml
vim configmap.yaml

touch secret.yaml
vim secret.yaml

touch db.yaml
vim db.yaml

touch web.yaml
vim web.yaml

microk8s kubectl get pods
microk8s kubectl apply -f configmap.yaml
microk8s kubectl apply -f secret.yaml
microk8s kubectl apply -f db.yaml
microk8s kubectl apply -f web.yaml
microk8s kubectl get all

```

#### Files

- [configmap.yaml](./Content/B/configmap.yaml)
- [secret.yaml](./Content/B/secret.yamlyaml)
- [db.yaml](./Content/B/mongodb.yaml)
- [web.yaml](./Content/B/webapp.yaml)

# Punkte

#### Sie haben in Teil A Begrifflichkeiten erklärt und hier in Teil B ein Projekt durchgeführt. Sie haben einen Teil der Services nicht so umgesetzt wie in den Begrifflichkeiten/im Tutorial erklärt. Begründen Sie welcher Teil das ist und wieso? (Tipp: es geht um die Datenbank)

Master node:
![](./Content/Cameron/03%20Cameron.png)
![](./Content/Cameron/02%20Cameron.png)

- Der Unterschied liegt im Einsatz und im Dienst, da wir sie in Teil B in einer Datei zusammengefasst haben. Es wäre auch möglich gewesen, sie getrennt zu halten.


#### In der ConfigMap.yaml haben Sie die MongoUrl definiert, resp. sie war bereits definiert. Erklären Sie wieso der angegebene Wert korrekt ist.

- Die angegebene MongoURL in mongo-config.yaml war korrekt, da wir den definierten Namen in mongo-service verwendet haben. Der Name in mongo-service verweist also auf die MongoDB.

#### Zeigen Sie, dass die App installiert wurde. rufen Sie den Befehl microk8s kubectl describe service webapp-service auf mindestens zwei Nodes auf und erstellen Sie Screenshots des Resultats.

Master node:
![](./Content/Cameron/05Cameron.png)

Node 1:
![](./Content/Cameron/04Cameron.png)


#### Rufen Sie nun den gleichen Befehl für den zweiten Service auf (nur auf einem der Nodes). Erstellen Sie einen Screenshot. Es gibt Unterschiede. Erklären Sie die Unterschiede in ein paar kurzen Sätzen.

Node 1:
![](./Content/Cameron/06Cameron.png)

Unterschied zwischen Webapp-Dienstbeschreibung und Mongo-Dienstbeschreibung:

- **Typ**: . Im (mongo-service) ist der Typ ClusterIP, was bedeutet, dass der Dienst nur intern innerhalb des Clusters zugänglich ist. Im (Webapp-Dienst) ist der Typ NodePort, was bedeutet, dass der Dienst auf der IP eines jeden Knotens an einem statischen Port zugänglich ist.

- **NodePort**: Dieses Feld ist nur in der Beschreibung des webapp-Dienstes vorhanden. Es gibt den Port auf jedem Knoten an, über den der Dienst zugänglich ist.

- **Endpunkte**: Dieses Feld listet die IP-Adressen und Ports der tatsächlichen Pods auf, die den Dienst unterstützen. Bei mongo-service gibt es einen Endpunkt (10.1.175.129:27017), während es bei webapp-service mehrere Endpunkte gibt (10.1.175.110:3000, 10.1.175.120:3000, 10.1.175.130:3000).

#### Screenshot der Seite, inkl. URL von mindestens zwei Nodes des Clusters und erklären Sie was Sie tun mussten.

Master node:
![](./Content/Cameron/07Cameron.png)

Node 1:
![]()

- **Inbound Rule**: Ich musste der **Sicherheitsgruppe** eine eingehende Regel hinzufügen, die Port **30100** zulässt, da ich sonst nicht auf die Website zugreifen kann.

#### Verbindung mit MongoDB Compass. Wieso geht es nicht? Begründen Sie was man im Service/Deployment ändern könnte, so dass es anschliessend geht?

- Die Verbindung zur Datenbank würde nicht funktionieren, da der Port von Kubernetes und AWS nicht geöffnet ist. Wir müssten den Port in db.yml öffnen und ihn in AWS öffnen, damit wir eine Verbindung mit MongoDB Compass herstellen können.

#### Service Definition anpassen

- In web.yaml den NodePort (32000) und replicas (3) anpassen.
- Erklären Sie welche Schritte Sie durchführen müssen.
- Den Befehl microk8s kubectl apply -f web.yaml nochmals ausführen.
- Screenshot (von einem Node) mit der funktionierenden Webseite
- Screenshot des Befehls microk8s kubectl describe service webapp-service

- open the port 32000
- With the command nano web.yaml the changes to the yaml file could be implemnted.