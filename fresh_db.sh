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
php artisan view:clear

# Delete the migration that might be causing issues
if [ -f "database/migrations/2025_05_24_fix_defaultpassword_column.php" ]; then
    echo "Removing old migration file..."
    rm database/migrations/2025_05_24_fix_defaultpassword_column.php
fi

# Make sure our new migration exists
if [ ! -f "database/migrations/2025_05_25_000000_fix_defaultpassword_column.php" ]; then
    echo "Migration for fixing defaultpassword column not found!"
    exit 1
fi

# Drop all tables and recreate them
echo "Refreshing database..."
php artisan migrate:fresh --force

echo "=== Database refresh completed successfully ===" 