#!/bin/bash

source ~/.bash_aliases

cd /data/sqlfiles

mysqldump -hlocalhost -uroot -plocaldb001 laravel>laravel.sql