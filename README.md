# Symfony Bar

## Clone the repo

```bash
git clone git@github.com:AnrelWsh/bar-symfony
```

## Composer

```bash
composer install
```


## Environment

Create a .env.local and add :

```bash
APP_SECRET=<app_secret>
DATABASE_URL="mysql://ID:PASSWORD@127.0.0.1:3306/<DB_name>&charset=utf8mb4"

```

## Database

```bash
php bin/console doctrine:database:create
php bin/console doctrine:migrations:migrate
```

## Start server

```bash
symfony serve
```