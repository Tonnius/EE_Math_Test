@echo off
"D:\Program Files (x86)\PHP\v5.5\php.exe" get_composer_packages.php
"D:\Program Files (x86)\PHP\v5.5\php.exe" artisan migrate:reset
"D:\Program Files (x86)\PHP\v5.5\php.exe" artisan migrate --seed
