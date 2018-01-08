#!/bin/bash

source ~/.bash_aliases

cd /data/www/hello_laravel/public/sql

mysqldump -hlocalhost -uroot -plocaldb001 laravel>laravel.sql