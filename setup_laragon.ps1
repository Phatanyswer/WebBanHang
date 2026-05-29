# setup_laragon.ps1
# Script to create database and import database.sql into Laragon's MySQL (Windows PowerShell)

# Configuration - adjust if your Laragon MySQL uses different credentials
$mysqlUser = "root"
$mysqlPass = ""   # Laragon default: empty password
$dbName = "my_store"
$sqlFile = "$(Join-Path (Get-Location) 'database.sql')"

Write-Host "Using MySQL user: $mysqlUser, database: $dbName"

if (-Not (Test-Path $sqlFile)) {
    Write-Error "SQL file not found: $sqlFile"
    exit 1
}

# Create database
Write-Host "Creating database (if not exists)..."
$createCmd = "CREATE DATABASE IF NOT EXISTS `$dbName` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;"
mysql -u $mysqlUser @(if ($mysqlPass -ne "") { "-p$mysqlPass" }) -e $createCmd
if ($LASTEXITCODE -ne 0) { Write-Error "Failed to create database"; exit 1 }

# Import SQL
Write-Host "Importing $sqlFile into $dbName (this may take a while)..."
mysql -u $mysqlUser @(if ($mysqlPass -ne "") { "-p$mysqlPass" }) $dbName < $sqlFile
if ($LASTEXITCODE -ne 0) { Write-Error "Import failed"; exit 1 }

Write-Host "Import finished."
Write-Host "Next: start Laragon (Start All), then open http://localhost/4851_NguyenNgocTinh_WebsiteBanHang/ or setup auto virtual host in Laragon to use a .test domain."