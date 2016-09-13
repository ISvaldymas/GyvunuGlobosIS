Idiegti nauja projekta:<br>
-----------------------<br>
git clone https://github.com/InformaciniuSistemuPagrindai/KambariuRezervacija.git<br>
cd KambariuRezervacija<br>
composer install<br>
php artisan cache:clear<br>
php artisan key:generate<br>
php artisan migrate<br>
php artisan serve<br>
<br>
Commitinti pakeitimus:<br>
----------------------
git add .<br>
git status<br>
git commit -m "New project"<br>
git push -u origin master
