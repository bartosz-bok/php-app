#!/bin/bash

check_db_connection() {
    while ! mysqladmin ping -h mysql --silent; do
        echo "Czekam na gotowość bazy danych..."
        sleep 1
    done
    echo "Baza danych postawiona. Próbuję zainicjować tabele oraz wgrać dane początkowe."
}

check_db_connection

# Wykonanie skryptów SQL przy uruchamianiu kontenera MySQL
mysql -h mysql -P 3306 -u root -p db --password=password < /sql_scripts/init_db.sql
mysql -h mysql -P 3306 -u root -p db --password=password < /sql_scripts/fill_example.sql &

echo "Zainicjowano tabele oraz wgrano dane początkowe."
echo "Stawiam serwer..."

# Uruchomienie serwera PHP
php -S 0.0.0.0:8000

