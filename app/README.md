# IP Media Backend Challenge

This is an application writen in PHP's Laravel to query and filter a long list of items.

## About

This application runs on Docker, as it has a single container for a PHP image bundled with Apache.

This application also uses Composer to handle dependencies.

## Installation
Once you have Node and Docker running on your environment, it's time to set up this application. For this, start by cloning this repository on a folder of your choosing, and then move into the newly created folder and performe the following instructions.

1. Set up the container with
```
docker-compose build
```
Once it has finished building the container, run
```
docker-compose up -d
```
To get it up and running

2. Now you'll need to install all the project's dependencies, execute the following:
```
docker-compose exec web composer install
```

3. Then create a file named `.env` from the `.env.example` file by running the following:
```
cp .env.example .env
```
Make sure the environment variable `LEGACY_API_URL` is configured. The default values should work for now.

4. In order for Laravel be able to write logs on your system, you must allowed it to. So run the following:
```
docker-compose exec web chmod -R 777 storage/
```

5. And you're done! If you run into any troubles try cleaning Laravel's cache or turning off and on again the app's container. Use:
```
docker-compose exec web php artisan cache:clear
```
```
docker-compose down && docker-compose up -d
```

## Usage
To use this app, access it on your browser with the following URL `http://localhost:8015/`. 

On the main page you'll have access to a list of Spaceships from the Star Wars franchise. From here you can:

* Click on the "Create" tab to access the form for creating new ship entries on the database
* Click on the lens icon to get a detailed view of a ship.
* Click on the pencil icon to open up a modal with a form to edit the ship's detail.
* Click on the trash icon to delete a ship from the database.

## Testing
If you want to quickly test if your application is up and running, try running the tests feature. For data safety reasons we recommend running the json-server feature using the empty db file for testing. Run this:
```
json-server --watch mock_server/db_testing.json
```
Then this for testing:
```
php artisan test tests/Feature/BasicTesting.php
```
This will test the application main features. Remember to make sure `RESOURCE_URL` and `RESOURCE_PORT`are set up on your .env and that your json-server app is up and accepting requests.