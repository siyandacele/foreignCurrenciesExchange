DIRECTORY STRUCTURE
-------------------

      assets/               contains assets definition
      app/config/           contains application configurations
      app/route/            contains Web controller 
      app/view/email/       contains view files for e-mails
      app/CurrencyPurchase/ contains model classes
      app/views/            contains view files for the Web application


REQUIREMENTS
------------

The minimum requirement by this application template that your Web server supports PHP 5.4.0.

Import the currencies_db.sql to your database.


CONFIGURATION
-------------

### Database

Edit the file `app/config/development.php` with real data.

```php
    return [
        'db' => [
            'driver' => 'mysql',
            'host' => 'localhost',
            'name' => 'currencies_db',
            'username' => 'username',
            'password' => 'password',
            'charset' => 'utf8',
            'collation' => 'utf8_unicode_ci',
            'prefix' => ''
        ],
    ];
```