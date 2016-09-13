Idiegti nauja projekta:
-----------------------
git clone https://github.com/InformaciniuSistemuPagrindai/KambariuRezervacija.git
cd KambariuRezervacija
composer install
php artisan cache:clear
php artisan key:generate
php artisan migrate
php artisan serve

Commitinti pakeitimus:
----------------------
git add .
git status
git commit -m "New project"
git push -u origin master
