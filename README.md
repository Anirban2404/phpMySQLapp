# phpMySQLapp
A sample LAMP based web service stack.
LAMP stack is a popular open source web platform commonly used to run dynamic web sites and servers. 
It includes Linux, Apache, MySQL, and PHP and is considered by many the platform of choice for development 
and deployment of high performance web applications which require a solid and reliable foundation.

![Alt text](https://github.com/Anirban2404/phpMySQLapp/blob/master/homePage.JPG "Screen Shot")

### Setup Databases
* We are using Mysql as the database, so you need to Install MySQL and Configure MySQL properly.
* Install git and clone the repository.
* The *.sql files are located in the mySqlDB folder.
* Create two databases and name it "bookstore" and "moviedb", set collation to "utf8_unicode_ci";
* "Import" the "mySqlDB/movieDB.sql" and "mySqlDB/bookDB.sql" files, it will create the tables and populate the tables with initial data.
You can use phpmyadmin to import or you can do it from the terminal
```
mysql -u <username> -p <databasename> < <filename.sql>
```
### Need to change db connection address at webserver node
```
sudo sed -i -e 's/127.0.0.1/<<ip_address>>/g' /var/www/html/books/includes/bookDatabase.php 
```
```
sudo sed -i -e 's/127.0.0.1/<<ip_address>>/g' /var/www/html/movies/includes/movieDatabase.php
```
