#!/bin/bash

mysql -h 127.0.0.1 -P 3306 -u root -p db --password=password < sql_scripts/init_db.sql
mysql -h 127.0.0.1 -P 3306 -u root -p db --password=password < sql_scripts/fill_example.sql