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
php artisan view:clear

# Delete the migration that might be causing issues
if (Test-Path "database/migrations/2025_05_24_fix_defaultpassword_column.php") {
    Write-Host "Removing old migration file..." -ForegroundColor Yellow
    Remove-Item "database/migrations/2025_05_24_fix_defaultpassword_column.php" -Force
}

# Make sure our new migration exists
if (-not (Test-Path "database/migrations/2025_05_25_000000_fix_defaultpassword_column.php")) {
    Write-Host "Migration for fixing defaultpassword column not found!" -ForegroundColor Red
    exit 1
}

# Drop all tables and recreate them
Write-Host "Refreshing database..." -ForegroundColor Cyan
php artisan migrate:fresh --force

Write-Host "=== Database refresh completed successfully ===" -ForegroundColor Green 