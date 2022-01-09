# php-test

## Solution

The framework used is Laravel 8, which is the most popular option to simplify work when using PHP.

## Changes in the db script

No changes were made in the db script.

## Execution

To execute this solution, you will need docker and docker-compose.

You will need also an .env file, containing the database variables. Create a file named .env at the root of the laravel directory (```/php-test/laravel```) and paste these lines:
```
APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:azAJKVjZ91jP5PXPKsQD4y4oT54CaPdulU7mZ5V6z1s=
APP_DEBUG=true
APP_URL=http://localhost

LOG_CHANNEL=stack
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=db
DB_PORT=3306
DB_DATABASE=blankfactor
DB_USERNAME=bfuser
DB_PASSWORD=bfpassword

BROADCAST_DRIVER=log
CACHE_DRIVER=file
FILESYSTEM_DRIVER=local
QUEUE_CONNECTION=sync
SESSION_DRIVER=file
SESSION_LIFETIME=120

MEMCACHED_HOST=127.0.0.1

REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

MAIL_MAILER=smtp
MAIL_HOST=mailhog
MAIL_PORT=1025
MAIL_USERNAME=null
MAIL_PASSWORD=null
MAIL_ENCRYPTION=null
MAIL_FROM_ADDRESS=null
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PUSHER_APP_ID=
PUSHER_APP_KEY=
PUSHER_APP_SECRET=
PUSHER_APP_CLUSTER=mt1

MIX_PUSHER_APP_KEY="${PUSHER_APP_KEY}"
MIX_PUSHER_APP_CLUSTER="${PUSHER_APP_CLUSTER}"
```

Then, go to the laravel root directory (```/php-test/laravel```) and execute: 

``` docker-compose up -d ```

This will build mysql and php services required for this test.

Then, you will need to install composer dependencies, so execute:

```docker exec -it laravel_app_1  bash```

You're now in the laravel image directory. Type ```composer install``` to install the required dependencies.

There's no need to migrate a db model, the database is already created. So in less words, you're ready to execute the endpoints.

I recommend using postman to test the endpoints. The routes are:

- ```http://0.0.0.0:8080/api/add_user``` (POST). A body example is:

```
{
    "name": "Felix",
    "last_name":"Suarez",
    "email":"Felix@Suarez.com",
    "password":"abc1234"
}
```

The response should be:

```
{
    "Result": "Data has been saved"
}
```

- ```http://0.0.0.0:8080/api/get_user/{user id}``` .Example of this endpoint execution (when an user is created):

```http://0.0.0.0:8080/api/get_user/1```

And the response should be:

```
{
    "id": 1,
    "name": "Felix",
    "last_name":"Suarez",
    "email":"Felix@Suarez.com",
    "password":"abc1234"
}
```
