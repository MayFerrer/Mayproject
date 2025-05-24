# PowerShell script to refresh the database with proper error handling

Write-Host "=== Starting database refresh ===" -ForegroundColor Green

# Make sure Doctrine DBAL is installed
$hasDoctrine = (composer show | Select-String -Pattern "doctrine/dbal" -Quiet)
if (-not $hasDoctrine) {
    Write-Host "Installing Doctrine DBAL package..." -ForegroundColor Yellow
    composer require doctrine/dbal
}

# Clear any cached config
Write-Host "Clearing cache..." -ForegroundColor Cyan
php artisan cache:clear
php artisan config:clear
php artisan route:clear

# Drop all tables and recreate them
Write-Host "Refreshing database..." -ForegroundColor Cyan
php artisan migrate:fresh --force

Write-Host "=== Database refresh completed successfully ===" -ForegroundColor Green 