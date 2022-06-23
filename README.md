# Programowanie aplikacji internetowych

## WSB w Poznaniu - Studia I stopnia - Kierunek Informatyka

### Informacje wstępne

Kod znajdujący się w repozytorium został przygotowany jako wsparcie dla zajęć realizowanych na WSB w Poznaniu, w ramach Studiów I stopnia na Kierunku Informatyka.

Materiał powinien być wykorzystywany w połączeniu z dodatkowymi wyjaśnieniami, na przykład ze strony Prowadzącego zajęcia.

Kod zawarty w repozytorium służy tylko i wyłącznie celom edukacyjnych. W szczególności nie powinien być wykorzystywany produkcyjnie z uwagi na zawarte w nim uproszczenia.



### Źródła

Szczegółowe odwołania do źródeł, na bazie których powstawały załączone przykłady, znaleźć można na platformie Moodle oraz w materiałach prezentowanych w trakcie zajęć.

Poniżej wybrane źródła:
* https://laravel.com/docs/9.x/installation, Laravel LLC, 2011 - 2022
* https://laravel.com/docs/9.x/routing, Laravel LLC, 2011 - 2022
* https://laravel.com/docs/9.x/database, Laravel LLC, 2011 - 2022
* https://laravel.com/docs/9.x/controllers, Laravel LLC, 2011 - 2022
* https://laravel.com/docs/9.x/views, Laravel LLC, 2011 - 2022
* https://laravel.com/docs/9.x/eloquent, Laravel LLC, 2011 - 2022



### Uruchomienie projektu

Przed przystąpieniem do uruchomienia projektu warto zainstalować PHP w wersji co najmniej 7.4  oraz serwer bazodanowy MySQL/MariaDB.

Wspomniane wyżej komponenty mogą zostać zainstalowane osobno lub na podstawie zestawu, np. Xampp (https://www.apachefriends.org/pl/download.html).

Dodatkowo, warto również zainstalować Composer (https://getcomposer.org/download/), tak, aby móc zarządzać zależnościami projektu.

Następnie, warto zmienić nazwę pliku _.env.example_ na _.env_ oraz skonfigurować, w jego ramach, parametry połączenia z wybraną, pustą, bazą danych.

Następnie, można uruchomić następujące polecenia z poziomu CLI:
1. *composer install*
2. *php artisan key:generate*
3. *php artisan migrate*
4. *php artisan serve*

Opcjonalnie, można również zainicjować, z poziomu CLI, dane w bazie danych za pomocą wybranych seederów, poniżej przykład dla inicjowania danych Klientów:      
_php artisan db:seed --class=CustomerSeeder_

Składnia powyższych poleceń zakłada, iż ścieżki do katalogów zawierających _composer_ oraz _php_ znajdują się w zmiennej środowiskowej _PATH_, umożliwiającej ich wywołanie bez konieczności podawania całej ścieżki.
