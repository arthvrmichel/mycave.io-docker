# mycave.io 📚
The API to manage your videogames collection. 👾

[![Build](https://github.com/arthvrmichel/mycave.io-docker/actions/workflows/ci.yml/badge.svg)](https://github.com/arthvrmichel/mycave.io-docker/actions/workflows/ci.yml)
[![Dependency Review](https://github.com/arthvrmichel/mycave.io-docker/actions/workflows/dependency-review.yml/badge.svg)](https://github.com/arthvrmichel/mycave.io-docker/actions/workflows/dependency-review.yml)

## Getting started 🧗
### Prerequisite ✔️
* Have docker and docker compose
* Have the make command
### Installation ⬇️
* Clone the project
* Get a the racine of the project
* Run `make start`
* Now you can access the API documentation with the URL `http://localhost/api`

## Make commands 📜
* `help`: Outputs the helpscreen
### Docker 🐳
* `build`: Builds the Docker images
* `up`: Start the docker hub in detached mode
* `start`: Build AND start the containers
* `down`: Stop the docker hub
* `logs`: Show live logs
* `sh`: Connect to the PHP FPM container
### Composer 🧙
* `composer`: Run composer, pass the parameter "c=" to run a given command, example: make composer c='req symfony/orm-pack
* `vendor`: Install vendors according to the current composer.lock file
### Symfony 🎵
* `sf`: List all Symfony commands or pass the parameter "c=" to run a given command, example: make sf c=about
* `cc`: Clear the cache
* `remake-database`: Remake the database and run the basic data command
* `phpunit` Run the unit tests, pass the parameter "c=" to run tests in a specific directory or class, example: make phpunit c=tests/Entity