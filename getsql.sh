rsync -P -e ssh -r root@bj001:/data/www/hello_laravel/public/sql/* public/sql/

cd public/sql

mysql -uroot -plocaldb001 heibailu<laravel.sql