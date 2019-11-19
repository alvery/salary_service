# Salary calculator project

To build, run and test this application follow the instructions below

## Start php-fpm container

`docker-compose up -d`

## Install dependencies

`docker exec -ti php-fpm /bin/sh -c "composer install"`

## Run the command to calculate employee salaries

`docker exec -ti php-fpm /bin/sh -c "php bin/console.php salary:process"`

## Run tests
`docker exec -ti php-fpm /bin/sh -c "./vendor/bin/phpunit --bootstrap vendor/autoload.php tests/"`