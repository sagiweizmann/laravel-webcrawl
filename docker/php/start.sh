#!/bin/bash

# Navigate to the Laravel project directory
cd /usr/local/www/backend

# Install PHP dependencies
composer install

# Run the Laravel development server
php artisan serve --host=0.0.0.0 --port=8000
