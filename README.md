# Test Pokemon API

Front-end for [Pokéapi](https://pokeapi.co/) (one of)

## Techs
PHP 8.3, Laravel 11, Vue 3, axios

## Install & Setup

The project was done with the use of [Laravel Sail](https://laravel.com/docs/11.x/sail).

To load Sail for cloned project run:

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer update laravel/sail
```

and then

```
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v $(pwd):/var/www/html \
    -w /var/www/html \
    laravelsail/php81-composer:latest \
    composer install --ignore-platform-reqs
```

Pls note that I had to set `SESSION_DRIVER=array` in my `.env` file. Otherwise, since there's no databese in use, Laravel throws an error.

To build front-end using `vite`:

```
npm install
npm run dev
```

`npm` version used was `10.7.0`

## Additional notes

* `Redis` is mentioned as a dependency in `docker-compose.xml` I wanted to utilize it for caching of API responses. Proper notes are left in the code.

* There is some repetitive code in Vue components (in `views`) regarding API responses processing (whether there's a loading, or HTTP errors). Those should definitely be done as an error handling components or smth similar.

### That's it. Thank you for your time.
