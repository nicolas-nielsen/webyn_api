# WebynApi

This project was generated using Symfony 7.2

Requirements are: PHP 8.2 or above, composer and docker

## Installation and running the app

To install dependencies run:

```bash
composer install
```

To launch the project:
- define `POSTGRES_USER`, `POSTGRES_PASSWORD` and `POSTGRES_DB` variables in the env file
- run docker-compose up -d (or docker compose up -d depending on docker version)
- run `symfony console doctrine:migrations:migrate` to create db schema
- run `symfony console doctrine:fixtures:load` to populate db

To start a local development server, run:

```bash
symfony serve
```

The server is running on`http://localhost:8000/`.

Tests can be run with:

```bash
./vendor/bin/phpunit
```