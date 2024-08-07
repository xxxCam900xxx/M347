# KN06

```bash
microk8s.add-node
```

### A) Installation (50%)

1. Rufen Sie den Befehl microk8s kubectl get nodes auf einem der Nodes auf und zeigen Sie mit einem Screenshot, dass alle drei Nodes hinzugefügt wurden

![](./Content/Cameron/01%20Cameron.png)

### B) Verständnis für Cluster (50%)

1. Erklären Sie den Unterschied zwischen den Befehlen microk8s und microk8s kubectl mit eigenen Worten.

Unterschied zwischen den Befehlen microk8s und microk8s kubectl:
microk8s wird für die Verwaltung der gesamten MicroK8s-Umgebung verwendet, während microk8s kubectl sich auf die Verwaltung der Arbeitslasten und Ressourcen innerhalb des Kubernetes-Clusters selbst konzentriert.

2. Gemäss den obenstehenden Schritten

#### Rufen Sie microk8s kubectl get nodes auf einem zweiten der drei Instanzen auf.

```bash
microk8s.kubectl get nodes
```

Node 2:
![](./Content/Cameron/KNB03%20Cameron.png)
Node 3:
![](./Content/Cameron/KNB04%20Cameron.png)

#### Rufen Sie den Befehl microk8s status auf und schauen Sie die ersten paar Zeilen an (vor "addons"). Was bedeuten diese?

![](./Content/Cameron/KNB05%20Cameron%20node2%20Status.png)
![](./Content/Cameron/Cameron%20Standybynone.png)

Die erste Zeile microK8s is running zeigt an, dass der MicroK8s-Dienst auf dem aktuellen Knoten läuft, die Zeile high-availability: yes zeigt an, dass der MicroK8s-Cluster für Hochverfügbarkeit konfiguriert ist (gewährleistet Redundanz und Ausfallsicherheit durch Aufrechterhaltung eines konsistenten und synchronisierten Datenspeichers über mehrere Knoten). datastore master nodes: 172.31.96.100:19001 172.31.96.110:19001 172.31.96.120:19001 Dieser Abschnitt listet die IP-Adressen und Ports der mit dem Master-Knoten verbundenen Knoten auf. datastore standby nodes: none Zeile zeigt an, dass keine Standby-Knoten verfügbar sind. Bei Standby-Knoten handelt es sich in der Regel um Replikate von Master-Knoten, die im Falle eines Ausfalls die Datenintegrität und -verfügbarkeit aufrechterhalten können.

#### Entfernen Sie einen Node vom Cluster.

```bash
microk8s leave

microk8s.remove-node <node-name>
```

Node1:
![](./Content/Cameron/KNB06%20Cameron%20node3%20leave.png)
Master:
![](./Content/Cameron/KNB06%20Cameron%20node%20master%20get.png)

#### Fügen Sie nun den Node wieder dem Cluster hinzu, aber dieses Mal als Worker (--worker):

```bash
microk8s.kubectl get nodes
microk8s.add-node --worker
microk8s.kubectl get nodes
```

![](./Content/Cameron/KNB07%20Cameron%20node3%20worker.png)

![](./Content/Cameron/KNB07%20Cameron%20master%20worker%20node.png)

#### Rufen Sie nochmals den Befehl microk8s status auf. Was ist der Unterschied und woher kommt dieser.

![](./Content/Cameron/KNB08%20Cameron%20master%20status.png)

Dies liegt daran, dass einer der Knoten jetzt ein Arbeitsknoten ist und diese nicht auf der Kubernetes-Kontrollebene laufen. Der Cluster verfügt nicht mehr über HA

#### Rufen Sie nochmals microk8s kubectl get nodes auf, sowohl auf einem der Master als auch auf dem Worker. Dokumentieren Sie die Resultate mit Screenshots. Wieso stimmt dies überein mit dem Result des Befehls microk8s status ?

Master:
![](./Content/Cameron/KNB08%20Cameron%20master%20GET.png)

Worker:
![](./Content/Cameron/KNB08%20Cameron%20worker%20GET.png)

Da der Arbeitsknoten nicht auf der Steuerungsebene arbeitet, hat er auch keinen Status. Das bedeutet, dass er nur vom Masterknoten aufgerufen werden kann.
