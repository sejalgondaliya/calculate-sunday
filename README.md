# Calculate the number of Sundays between two dates
----------

# Getting started

## Installation

Please check the official laravel installation guide for server requirements before you start. [Official Documentation](https://laravel.com/docs/10.x/installation#creating-a-laravel-project)

Clone the repository

    git clone https://sejalgondaliya@github.com/sejalgondaliya/calculate-sunday.git

Switch to the repo folder

    cd calculate-sunday

Install all the dependencies using composer

    composer install

Copy the example env file and make the required configuration changes in the .env file

    cp .env.example .env

Generate a new application key

    php artisan key:generate

Start the local development server

    php artisan serve

You can now access the server at http://localhost:8000

**TL;DR command list**

    git clone https://sejalgondaliya@github.com/sejalgondaliya/calculate-sunday.git
    cd calculate-sunday
    composer install
    cp .env.example .env
    php artisan key:generate

The api can be accessed at [http://localhost:8000/api](http://localhost:8000/api).

----------

# Testing API

Run the laravel development server

    php artisan serve

The api can now be accessed at

    http://localhost:8000/api
    
**Calculate the number of Sundays between two dates API**

    http://localhost:8000/api/calculate-sunday

Parameters

| **Required** 	| **Key**              	| **Value**            	| **Format** | **Example** |
|----------	|------------------	|------------------	|-----------|--------|
| Yes      	| start_date     	| enter any date 	| Y-m-d | 2023-12-07 |
| Yes      	| end_date 	| enter any date   	| Y-m-d | 2025-12-07 |

## Validation

- `start_date and end_date must be required`
- `The dates are least two years apart but no more than five`
- `The start date cannot be a Sunday`
- `The start date cannot be greater than the end date`

## Expected Output

- `The number of Sundays between the two dates (including the days selected) excluding any Sunday that falls on or after the 28th of the month.`
