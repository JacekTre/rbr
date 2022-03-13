
# Zadanie rekrutacyjne RBR

#### Stack technologiczny
- MySQL 5.7
- Apache 2
- PHP 7.4
- Laravel 8.4.4
- composer
- git
- docker-compose (dla lokalnego środowiska programistycznego)

#### Instalacja
- W katalogu projektu wykonaj kolejno kommendy:
```
git clone git@github.com:JacekTre/rbr.git
git flow init
cp .env.example .env
cp docker-compose.yml.dist docker-compose.yml
```
- W kontenerze rbr_app:
```
composer install
php artisan migrate
```

#### Docker
- Budowa kontenerów:
```
docker-compose build --force-rm --no-cache
```
- Podniesienie kontenerów:
```
docker-compose up -d
```
- Wyłączenie kontenerów:
```
docker-compose down
```
- Wejście do kontenera aplikacji:
```
docker exec -it rbr_app bash
```
- Wejście do kontenera bazy danych:
```
docker exec -it rbr_db mysql -u rbr -prbr rbr
```
