# Web services php

## Dans WebServicesPhp

## Dépendances

```sh
composer install
npm i
```

Export de la base de données dans le fichier export.sql

Mettre le nom de votre BDD et vos identifiants et verifier l'url dans le fichier .env

```env
DATABASE_URL="mysql://username:password@localhost:80/database?serverVersion=5.7"
```

Si nouveau projet, installer Api platform et laminas

```sh
composer req api
composer require laminas/laminas-soap
```

Generation WSDL
<http://localhost:8000/soapgen>

Acces au WSDL
<http://localhost:8000/soap?wsdl>

## Importer les entitées

```sh
php bin/console doctrine:mapping:import "App\Entity" annotation --path=src/Entity
```

```sh
php bin/console make:entity --regenerate App
```

## Démarrage de l'application et d'API platform

```sh
symfony server:start -no-tls
```

<http://localhost:8000/>
<http://127.0.0.1:8000/api>

## Autres

Soap Entities et operations : WebServices_PHP/Src/Soap
Soap Controller : WebServices_PHP/src/controller/Soap/
Soap Client : WebServicesSoapClient/

Annotations pour api-platform : src/Entity
