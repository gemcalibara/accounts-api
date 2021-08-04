# Lumen PHP Framework

[![Build Status](https://travis-ci.org/laravel/lumen-framework.svg)](https://travis-ci.org/laravel/lumen-framework)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/lumen-framework)

Laravel Lumen is a stunningly fast PHP micro-framework for building web applications with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Lumen attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as routing, database abstraction, queueing, and caching.

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).

## Backend Test Description

To prove your abilities to solve tasks in an efficient and straight-forward way,
you'll implement a small back-end with a REST-like API and a database.
The data model consists of accounts and transactions . An account has a name,
while a transaction belongs to a single account, and has a date, description and
amount.

You should implement the following endpoints:
* List accounts
  - Also returns the sum balance of the account, based on the sum of the amount of all transactions for the account
* Create a new account
* List transactions for a specific account
* Create a new transaction for a specific account

The project needs to be made using Laravel and be an API.
The solution should contain an example of a test to check if you can create a
transaction.
This description is a bit vague on purpose in order for you to make some
decisions.
You should use github and the project should contain commit messages.

## API Endpoints

### Get list of accounts with the sum of the amount of all transactions

#### Request

`GET /api/accounts`

    curl --location --request GET 'http://localhost/api/accounts'

#### Response

    [
        {
            "id": 1,
            "account_name": "cash",
            "total_amount": 8549.01
        },
        {
            "id": 2,
            "account_name": "purchase",
            "total_amount": 73.78
        },
        {
            "id": 3,
            "account_name": "inventory",
            "total_amount": 6.78
        }
    ]
    
### Create a new account

#### Request

`POST /api/accounts`

    curl --location --request POST 'http://localhost/api/accounts' \ --header 'Content-Type: application/x-www-form-urlencoded' \ --data-urlencode 'account_name=test'

#### Response

    {
        "account_name": "test",
        "id": 5
    }

### List of transactions for a specific account

#### Request

`GET /api/accounts/{id}`

    curl --location --request GET 'http://localhost/api/accounts/1'

#### Response

    
     {
        "id": 1,
        "account_id": 1,
        "date": "2021-07-30",
        "description": "cash on hand",
        "amount": 100.50
    },
    {
        "id": 2,
        "account_id": 1,
        "date": "2021-07-30",
        "description": "This is sample only",
        "amount": 12.45
    }

### Create a new transaction for a specific account

#### Request

`POST /api/transactions`

    curl --location --request POST 'http://localhost/api/transactions' \ --header 'Content-Type: application/x-www-form-urlencoded' \ --data-urlencode 'account_id=3' \ --data urlencode 'description=This is sample purchase' \ --data-urlencode 'date=2021-07-31' \ --data-urlencode 'amount=6.78'

#### Response

    
     {
        "account_id": "3",
        "description": "This is sample purchase",
        "date": "2021-07-31",
        "amount": 6.78,
        "id": 17
    }
    
## Unit test for creating a transaction

### Command

`vendor/bin/phpunit --filter=testShouldCreateTransaction`

## Author

Lean Curve IVS (https://leancurve.com).
