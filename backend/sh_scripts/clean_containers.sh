#!/bin/bash

docker compose kill
docker compose stop
docker compose down --remove-orphans
echo ""

if [[ "$1" == "--remove-app" && "$2" == "--remove-mysql" ]]; then
    docker rmi mysql
    docker rmi backend-app-backend:latest
    docker rmi backend-app-frontend:latest

    sudo rm -r mysql-data
    sudo service mysql stop

    echo "Both application and MySQL images have been removed."
elif [ "$1" == "--remove-app" ]; then
    docker rmi backend-app:latest
    docker rmi backend-app-backend:latest
    docker rmi backend-app-frontend:latest

    echo "Application image removed."
elif [ "$1" == "--remove-mysql" ]; then
    docker rmi mysql

    sudo rm -r mysql-data
    sudo service mysql stop

    echo "MySQL image removed."
else
    echo "Application images and MySQL database were not deleted."
fi
