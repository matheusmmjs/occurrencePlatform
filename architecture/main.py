from diagrams import Cluster, Diagram, Edge
from diagrams.onprem.analytics import Spark
from diagrams.onprem.compute import Server
from diagrams.onprem.database import PostgreSQL
from diagrams.onprem.inmemory import Redis
from diagrams.onprem.aggregator import Fluentd
from diagrams.onprem.monitoring import Grafana, Prometheus
from diagrams.onprem.network import Nginx
from diagrams.onprem.queue import Kafka
from diagrams.onprem.client import User
from diagrams.onprem.container import Docker

with Diagram(name="Architecture occurrence platform", filename="diagram", show=True, direction="TB"):
    user = User("Web")

    with Cluster("Docker compose"):
        
        with Cluster("Dockerfile backend"):
            backend = Docker("backend")
            occurrencesBack = Server("./occurrences")
            jointOwnersBack = Server("./jointOwners")
            movementBack = Server("./movement")
            attachmentBack = Server("./attachment")
        
        with Cluster("Dockerfile nginx"):
            nginx = Nginx("nginx")

        with Cluster("Dockerfile database"):
            db = Docker("database")
            occurrencesDb = PostgreSQL("occurrences")
            jointOwnersDb = PostgreSQL("jointOwners")
            ticket = PostgreSQL("ticket")
            movementDb = PostgreSQL("movement")
            attachmentDb = PostgreSQL("attachment")
        
    user >> nginx
    
    nginx >> backend
    
    backend >> occurrencesBack
    backend >> jointOwnersBack
    backend >> movementBack
    backend >> attachmentBack
    backend >> db
    
    db >> occurrencesDb
    db >> jointOwnersDb
    db >> ticket
    db >> movementDb
    db >> attachmentDb