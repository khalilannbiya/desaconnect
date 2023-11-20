# LaporDesa

The purpose of this project is to develop an information system that allows residents of Lemahmulya village to file complaints against village officials online. The system will integrate a web-based application with a database to store complaint data and information about village officials. The information system will have several key features, including an online complaint form, complaint tracking, complaint history, and complaint reporting and statistics. The ultimate goal of this project is to create an information system that is user-friendly and effective in handling complaints from residents against village officials in Lemahmulya village. By having this information system, it is expected that residents can file complaints more easily and quickly, and village officials can be more effective and efficient in handling complaints. And the other purpose of creating this system is for learning purposes on Laravel version 10. This application was created using Laravel v10 and requires a minimum of PHP v8.1, so if during the installation or usage process there are errors or bugs, it is possible that it is due to an unsupported PHP version.

## Tech Stack

- **Client :** Tailwind, Blade Template
- **Server :** PHP with Laravel


## Run Locally

Clone the project

```bash
  git clone https://github.com/khalilannbiya/lapordesa.git
```

Or Download ZIP

[Link](https://github.com/khalilannbiya/lapordesa/archive/refs/heads/main.zip)

Go to the project directory

```bash
  cd lapordesa
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
  APP_NAME=LaporDesa
  APP_ENV=local //for development
  APP_KEY= // run the command php artisan key:generate
  APP_DEBUG=true
  APP_URL=http://lapordesa.test

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
