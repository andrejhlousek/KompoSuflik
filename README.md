KompoŠuflík

Webová aplikácia na výber a konfiguráciu počítačových komponentov.

Projekt bol vytvorený ako maturitná práca. Jeho cieľom je umožniť používateľovi prezerať počítačové komponenty, vyberať jednotlivé súčasti a vytvoriť vlastnú počítačovú zostavu pomocou konfigurátora s výpočtom celkovej ceny.

Použité technológie
HTML
CSS
JavaScript
PHP
MySQL
phpMyAdmin
XAMPP
Funkcie
Prehľad počítačových komponentov
Rozdelenie komponentov do kategórií
Zobrazenie informácií a cien komponentov
Konfigurátor počítača
Výpočet celkovej ceny zostavy
Ukladanie vytvorených konfigurácií do databázy
Zobrazenie obrázkov komponentov
Štruktúra projektu
.php súbory – jednotlivé stránky a funkcie webovej aplikácie
komposuflik.sql – databáza projektu
Hloušek/ – obrázky používané na webovej stránke
Spustenie projektu

Projekt je určený na lokálne spustenie pomocou XAMPP.

1. Nainštalovanie XAMPP

Nainštalujte XAMPP s podporou Apache a MySQL.

2. Spustenie služieb

V XAMPP Control Paneli spustite:

Apache
MySQL
3. Umiestnenie projektu

Skopírujte celý repozitár do priečinka:

C:\xampp\htdocs\

Napríklad:

C:\xampp\htdocs\KompoSuflik\

4. Vytvorenie databázy

Otvorte:

http://localhost/phpmyadmin

Vytvorte novú databázu s názvom:

komposuflik

Následne vyberte databázu a pomocou funkcie Import importujte súbor:

komposuflik.sql

5. Spustenie webovej aplikácie

Po úspešnom importe databázy otvorte v internetovom prehliadači:

http://localhost/KompoSuflik/

Webová aplikácia by sa mala následne načítať.

Databázové pripojenie

Projekt používa lokálne MySQL pripojenie:

Host: localhost
Používateľ: root
Heslo: prázdne
Databáza: komposuflik

Pri štandardnej inštalácii XAMPP nie je potrebné meniť databázové pripojenie.

Autor

Andrej Hloušek

Maturitná práca – Stredná odborná škola priemyselných technológií Púchov
