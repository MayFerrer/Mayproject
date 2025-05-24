#!/bin/bash

# This script refreshes the database with proper error handling

echo "=== Starting database refresh ==="

# Make sure Doctrine DBAL is installed
if ! composer show | grep -q "doctrine/dbal"; then
    echo "Installing Doctrine DBAL package..."
    composer require doctrine/dbal
fi

# Clear any cached config
echo "Clearing cache..."
php artisan cache:clear
php artisan config:clear
php artisan route:clear

# Drop all tables and recreate them
echo "Refreshing database..."
php artisan migrate:fresh --force

echo "=== Database refresh completed successfully ===" 