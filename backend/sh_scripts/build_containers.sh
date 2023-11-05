#!/bin/bash

mkdir mysql-data
chmod -R 777 mysql-data

docker compose up -d
