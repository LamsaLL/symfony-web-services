# Web services php

Dans WebServicesPhp :

export de la base de données dans export.sql

```sh
composer req api
```

Dans WebServicesSoapClient :

```sh
composer install
npm i
```

créer base de données "mi07" dans phpmyadmin et changer .env URL

```sh
npm run dev php bin/console doctrine:migrations:migrate
php bin/console doctrine:fixtures:load;
```

Soap Entities : WebServices_PHP/Src/Soap
Soap Controller : WebServices_PHP/src/controller/Soap/
Soap Client : WebServices_PHP_Client/

Annotations pour api-platform : src/Entity
