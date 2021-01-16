#!/bin/bash
sudo chown -R 1000:1000 *

docker-compose exec app setup

docker-compose exec app permissions

docker-compose exec app php artisan key:generate

docker-compose exec app fix

docker-compose exec app php artisan migrate
