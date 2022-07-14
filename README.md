# Web services php

## Dans WebServicesPhp

## Dépendances

```sh
composer install
npm i
npm run dev
```

export de la base de données dans export.sql
créer base de données "mi5" dans phpmyadmin et verifier .env URL

mettre le nom de votre BDD et vos identifiants

```env
DATABASE_URL="mysql://username:password@localhost:80/database?serverVersion=5.7"
```

si nouveau projet, installer Api platform et laminas

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

Soap Entities : WebServices_PHP/Src/Soap
Soap Controller : WebServices_PHP/src/controller/Soap/
Soap Client : WebServices_PHP_Client/

Annotations pour api-platform : src/Entity
