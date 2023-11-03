#!/bin/bash

docker compose kill
docker compose stop
docker compose down
sudo rm -r mysql-data
sudo service mysql stop