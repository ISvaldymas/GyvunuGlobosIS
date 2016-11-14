Idiegti nauja projekta:<br>
-----------------------
git clone https://github.com/InformaciniuSistemuPagrindai/KambariuRezervacija.git<br>
cd KambariuRezervacija<br>
composer install<br>
php artisan cache:clear<br>
php artisan key:generate<br>
php artisan migrate<br>
php artisan db:seed<br>
php artisan serve<br>
<br>
Commitinti pakeitimus:<br>
----------------------
git add .<br>
git status<br>
git commit -m "New project"<br>
git push -u origin master

// git config --global core.safecrlf false (naikina git klaidos pranesimus)
Laravel on windows:<br>
----------------------
download and install xampp:    https://www.apachefriends.org/index.html<br>
download and install composer: https://getcomposer.org/Composer-Setup.exe<br>
download and install git: https://git-scm.com/downloads<br>

Spaudžiame dešinį pelės klaviša tame folderyje, kur norime išsaugoti laravel projektą, pasirenkame <b>Git Bash Here</b> vedame komandas.

Komandos:<br>
----------------------
php artisan make:model Model_name -m arba --migartion	//Sukuria modeli, -m kartus sukuria migracija db<br>
php artisan make:controller NameController --resource	//Sukuria kontrolleri --resource kartus su CRUD<br>
php artisan make:seeder NameSeeder						//Sukuria seeda duomenu bazei<br>
php artisan route:list									//Isvardija routus<br>
Daugiau ivairiu komandu: php artisan list<br>

.env<br>
----------------------
Nusikopijuoti, kad veiktu el. laiškai:<br>
MAIL_DRIVER=smtp<br>
MAIL_HOST=smtp.gmail.com<br>
MAIL_PORT=587<br>
MAIL_USERNAME=kambariurezervacija@gmail.com<br>
MAIL_PASSWORD=InformaciniaiPagrindai<br>
MAIL_ENCRYPTION=tls<br>

Administratorius:<br>
----------------------------
email: admin@gmail.com<br>
passw: admin123<br>
<strong><p>Stenkitės kelti veikianti kodą ir rašyti tvarkingai, kad kitiem butų lengviau:)</p></strong>
