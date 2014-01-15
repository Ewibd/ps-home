# Installation mac

## installations préliminaires

* Mysql : `brew install mysql`
* PHP : http://matthewcampbell.org/php-apache-mysql-on-os-x-mountain-lion/
* open `/etc/apache2/httpd.conf`. Ajouter `LoadModule php5_module    /usr/local/opt/php53/libexec/apache2/libphp5.so`
* modifier la partie ligne 352 de `Deny from all` vers `Allow from all`
* redémarrer apache : `sudo apachectl restart`

## rédupération base 

* se connecter en root : `mysql -u root`
* créer un utilisateur : `grant all privileges on podcastscience_fm.* to 'podcastsciencefm'@'localhost' identified by 'lemotdepasse';`
* créer la table : `CREATE DATABASE podcastscience_fm;`
* ramener la sauvegarde dans la table : `mysql -u podcastsciencefm -p podcastscience_fm < /Users/BCoulange/Downloads/1389396168_-_podcastscience_fm.sql`