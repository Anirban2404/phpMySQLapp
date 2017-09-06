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

### Setup WebApplication
* You have to install Apache2 and PHP and configure it.
* Install git and clone the repository.
* In order for Apache to find the file and serve it correctly, it must be saved to a very specific directory, which is called the "web root". In Ubuntu 16.04, this directory is located at /var/www/html/ -- copy the git source code inside it. Folder Structure will be like below.
```
ubuntu@mywebserver:/var/www/html$ tree
.
├── admin_area
│   ├── insertbook.php
│   ├── insert_books.php
│   ├── insertmovie.php
│   └── insert_movies.php
├── books
│   ├── functions
│   │   ├── fetch.php
│   │   ├── functions.php
│   │   └── getbook.php
│   ├── home.php
│   ├── images
│   │   └── background_image.jpg
│   └── includes
│       └── bookDatabase.php
├── homePage.JPG
├── index.php
├── movies
│   ├── functions
│   │   ├── fetch.php
│   │   ├── functions.php
│   │   └── getmovie.php
│   ├── home.php
│   ├── images
│   │   └── background_image.jpg
│   └── includes
│       └── movieDatabase.php
├── mySqlDB
│   ├── bookDB.sql
│   └── movieDB.sql
├── README.md
└── siteImages
    ├── books.jpg
    └── movies.jpg
```   

#### Need to change db connection address at webserver node
Finally, you have to access the database from the webapplication.
You have to change the database access endoints in books/includes/bookDatabase.php and movies/includes/movieDatabase.php.
```
sudo sed -i -e 's/127.0.0.1/<<ip_address>>/g' /var/www/html/books/includes/bookDatabase.php 
```
```
sudo sed -i -e 's/127.0.0.1/<<ip_address>>/g' /var/www/html/movies/includes/movieDatabase.php
```
The default username is root and password is admin, if you change that make sure you also change it in books/includes/bookDatabase.php and movies/includes/movieDatabase.php.
