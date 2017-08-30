# phpMySQLapp
A sample LAMP based web service stack
LAMP stack is a popular open source web platform commonly used to run dynamic web sites and servers. 
It includes Linux, Apache, MySQL, and PHP and is considered by many the platform of choice for development 
and deployment of high performance web applications which require a solid and reliable foundation.

![Alt text](https://github.com/Anirban2404/phpMySQLapp/blob/master/homePage.JPG "Screen Shot")

# Need to change db connection address
sudo sed -i -e 's/127.0.0.1/<<ip_address>>/g' /var/www/html/books/includes/bookDatabase.php 
sudo sed -i -e 's/127.0.0.1/<<ip_address>>/g' /var/www/html/movies/includes/movieDatabase.php
