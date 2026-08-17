# KompoŠuflík

Webová aplikácia na výber, porovnávanie a konfiguráciu počítačových komponentov.

Projekt bol vytvorený ako maturitná práca. Jeho cieľom je umožniť používateľovi prezerať počítačové komponenty, vyberať jednotlivé súčasti a vytvoriť vlastnú počítačovú zostavu pomocou konfigurátora s výpočtom celkovej ceny.

## Použité technológie

* HTML
* CSS
* JavaScript
* PHP
* MySQL
* phpMyAdmin
* XAMPP

## Funkcie

* Prehľad počítačových komponentov
* Rozdelenie komponentov podľa kategórií
* Zobrazenie informácií a cien komponentov
* Konfigurátor počítača
* Výpočet celkovej ceny zostavy
* Ukladanie vytvorených konfigurácií do databázy
* Zobrazenie obrázkov jednotlivých komponentov

## Štruktúra projektu

* `.php` súbory – jednotlivé stránky a funkcie webovej aplikácie
* `komposuflik.sql` – databáza projektu
* `Hloušek/` – obrázky používané na webovej stránke

## Lokálne spustenie

Projekt je určený na lokálne spustenie pomocou **XAMPP**.

### 1. Nainštalovanie XAMPP

Nainštalujte XAMPP s podporou služieb **Apache** a **MySQL**.

### 2. Spustenie služieb

Otvorte **XAMPP Control Panel** a spustite:

* Apache
* MySQL

### 3. Umiestnenie projektu

Stiahnite tento GitHub repozitár a rozbaľte ho.

Celý priečinok projektu umiestnite do:

`C:\xampp\htdocs\`

Priečinok projektu pomenujte:

`Maturitna`

Výsledná cesta bude:

`C:\xampp\htdocs\Maturitna\`

### 4. Vytvorenie databázy

V internetovom prehliadači otvorte:

`http://localhost/phpmyadmin`

Vytvorte novú databázu s názvom:

`komposuflik`

Následne vyberte vytvorenú databázu a kliknite na **Import**.

Vyberte súbor:

`komposuflik.sql`

a import dokončite.

### 5. Spustenie webovej aplikácie

Po úspešnom importe databázy otvorte:

`http://localhost/Maturitna/`

Webová aplikácia by sa mala načítať.

## Databázové pripojenie

Projekt je nastavený na lokálne MySQL pripojenie používané v XAMPP:

* **Host:** `localhost`
* **Používateľ:** `root`
* **Heslo:** prázdne
* **Databáza:** `komposuflik`

Pri štandardnej konfigurácii XAMPP nie je potrebné tieto údaje meniť.

## Poznámka

Projekt je určený na lokálne spustenie. Na správne fungovanie je potrebné mať spustené služby **Apache** a **MySQL** v XAMPP.

## Autor

**Andrej Hloušek**

Maturitná práca
Stredná odborná škola priemyselných technológií Púchov
