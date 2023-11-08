#!/bin/bash

docker compose kill
docker compose stop
docker compose down
echo ""

if [[ "$1" == "--remove-app" && "$2" == "--remove-mysql" ]]; then
    docker rmi mysql
    docker rmi backend-app:latest

    sudo rm -r mysql-data
    sudo service mysql stop

    echo "Usunięto oba obrazy: aplikacji i MySQL."
elif [ "$1" == "--remove-app" ]; then
    docker rmi backend-app:latest

    echo "Usunięto obraz aplikacji."
elif [ "$1" == "--remove-mysql" ]; then
    docker rmi mysql

    sudo rm -r mysql-data
    sudo service mysql stop

    echo "Usunięto obraz MySQL."
else
    echo "Nie usunięto obrazów aplikacji oraz bazy MySQL."
fi
