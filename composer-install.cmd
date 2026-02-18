@echo off
set "COMPOSER_HOME=%LOCALAPPDATA%\Composer"
set "PHP_EXE=C:\Users\lynx9\AppData\Local\Microsoft\WinGet\Packages\PHP.PHP.8.3_Microsoft.Winget.Source_8wekyb3d8bbwe\php.exe"
set "COMPOSER_PHAR=%LOCALAPPDATA%\Programs\Composer\composer.phar"
cd /d "%~dp0"
"%PHP_EXE%" "%COMPOSER_PHAR%" install
pause
