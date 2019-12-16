# Fid-Arc

[![Build Status](https://api.travis-ci.org/HE-Arc/Fid-Arc.svg?branch=develop)](https://api.travis-ci.org/HE-Arc/Fid-Arc)

Fid-Arc is an online project, created to simplify life of companies who whant to create reward system for its customers. We want to get rid of physical reward cards.

## Installation guide

### Requirements

- PHP >= 7.2.0
- BCMath PHP Extension
- Ctype PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Database
    - MySQL 5.6+
    - PostgreSQL 9.4+
    - SQLite 3.8.8+
    - SQL Server 2017+
   
### Clone the repository

```shell=
git clone https://github.com/HE-Arc/Fid-Arc.git
```

### Laravel configuration

```shell=
# Copy the example .env file
cp .env.example .env

# Install depedencies
composer install

# After update you need to run
composer dump-autoload

# Generate laravel keys
php artisan key:generate

# Run the migrations
php artisan migrate

# Generate passport keys
php artisan passport:keys

# Finally populate the database with basics elements
php artisan db:seed

```
