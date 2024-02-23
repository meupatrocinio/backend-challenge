# IP Media Backend Challenge

This is an application writen in PHP's Laravel to query and filter a long list of items.

## About

This application runs on Docker, as it has a single container for a PHP image bundled with Apache.

This application also uses Composer to handle dependencies.

You may need Postman or Insomnia to send requests to the endpoint. Or you can send any of the requests on

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

The endpoint on the app running locally is `http://localhost:8015/items`. It can take 2 arguments: `perPage` to set the number of items por page and `page` to retrieve a specific page.
Examples:

```
curl --location 'http://localhost:8015/items'
```
```
curl --location 'http://localhost:8015/items?perPage=75'
```
```
curl --location 'http://localhost:8015/items?page=3&perPage=25'
```

As mentioned before, if you have Postman or Insomnia, you can use them to send requests testing the endpoint. The parameters are GET Request, `http://localhost:8015/items` for URL and `page`
or `perPage` as optional parameters
