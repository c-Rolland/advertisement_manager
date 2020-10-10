## Advertisements Manager

##### Required

Docker.

##### Install and Commands

```
# Run the following command to install and start the docker containers
docker-compose up -d

# Run the following command to stop the docker containers
docker-compose down

#Run the following commands to connect to apache/php (www) container shell :  
docker exec -it advertisements_manager_web_1 bash
```

##### Infrastructure configurations
- Apache 2 <br />
- PHP 7.3 <br />
- Mysql 5.7.31 <br />
- phpMyAdmin <br />

##### Access 
phpMyAdmin login : `advertisements_manager:advertisements_manager` <br />
Online .htaccess login : vive_la_france:Vive_La_France_10  <br />
 
##### Some URLs
Locale : `http://localhost:8888/`  <br />‡
Locale phpMyAdmin : `http://localhost:8881/`
