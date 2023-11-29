# DesaConnect

## Tech Stack

- **Client :** Tailwind, Blade Template
- **Server :** PHP with Laravel


## Run Locally

Clone the project

```bash
  git clone https://github.com/khalilannbiya/desaconnect.git
```

Or Download ZIP

[Link](https://github.com/khalilannbiya/desaconnect/archive/refs/heads/main.zip)

Go to the project directory

```bash
  cd desaconnect
```

Run the command

```bash
  composer update
```

Or

```bash
  composer install
```

Copy the .env file from .env.example.

```bash
  cp .env.example .env
```

Configure the .env file

```bash
  APP_NAME=DesaConnect
  APP_ENV=local //for development
  APP_KEY= // run the command php artisan key:generate
  APP_DEBUG=true // for development. change to false if you want publish the project
  APP_URL=http://desaconnect.test // for development, Adjust according to your URL when it's already hosted

  DB_CONNECTION=mysql
  DB_HOST=127.0.0.1
  DB_PORT=3306
  DB_DATABASE=lapordesa
  DB_USERNAME=root
  DB_PASSWORD=
```

Generate key

```bash
  php artisan key:generate
```

You can also run the command "php artisan migrate --seed" to execute the seeders that have been created, such as "Role," "User," and "Categories." This way, you can use the system directly without setting up role, user, and category data. 

```bash
  php artisan migrate --seed
```

If you only use "php artisan migrate" without the "--seed" option, you must run the command "php artisan db:seed --class=RoleSeeder" to be able to register an account without SQL errors.

```bash
  php artisan migrate
```
then
```bash
  php artisan db:seed --class=RoleSeeder
```

Install node_modules

```bash
  npm i
```

Run npm run dev

```bash
  npm run dev
```

Run serve

```bash
  php artisan serve
```
## Documentation

- [Tailwind](https://tailwindcss.com/docs/installation)
- [Blade Template](https://laravel.com/docs/9.x/blade)
- [Laravel](https://laravel.com/docs/9.x)

## Features

for now, i can't share the features


## Feedback

If you have any feedback, please reach out to us at syeichkhalil@gmail.com
