# Bukopin
This website was build using Pimcore 6 and every line of code made with love.
If you are new in this project, so please keep it clean and readable 😉

## Requirements
This requirements only for development both for front-end and back-end

- Web Server :
  - Nginx > v.1.8
    - pagespeed module (optional)
    - brotli (optional)
  - Apache
    - mod_rewrite
    - .htaccess support (AllowOverride All)
    - pagespeed module (optional)
    - brotli (optional)    
- PHP >= 7.2
  - php-fpm
  - memory_limit = -1
  - upload_max_filesize and post_max_size >= 100M (depending on your data)
  - pdo_mysql or mysqli
  - iconv
  - dom
  - simplexml
  - gd
  - exif
  - file_info
  - mbstring
  - zlib
  - zip
  - intl
  - opcache
  - curl
  - [composer](https://getcomposer.org/)
- Database Server
  - MariaDB >= 10.0.0.5 (I do recommend = 10.3.*)
  - MySQL >= 5.6.4
  - AWS Aurora (MySQL)
  - Percona Server
- Node Js
  - Node Js Version > 12.XX


## Run Docker
* Go to root directory
* run `docker-compose build`
* run `docker-compose up -d`

## PHP Container
Go into the PHP container with
* run `docker-compose exec php bash`

* run `chown -R 1000:1000 var`
* run `php bin/console assets:install web`


#### Generate Thumbnails

Pimcore offers a lot of custom commmands. For generating thumbnails run
`php bin/console pimcore:thumbnails:image` in you php container.

To preview images in admin panel, make sure you have the right permissions. 
As a workaround set `chmod -R 777 web/var` or `chmod -R 777 var`

## Access Pimcore 
You can now access pimcore frontend at http://localhost:8080 and admin at http://localhost:8080/admin

## Troubleshooting

If you're getting the following error with Pimcore 6

```* Warning: Declaration of Pimcore\Bundle\CoreBundle\EventListener\LegacyTemplateListener::onKernelView(Symfony\Component\HttpKernel\Event\GetResponseForControllerResultEvent $event) should be compatible with Sensio\Bundle\FrameworkExtraBundle\EventListener\TemplateListener::onKernelView(Symfony\Component\HttpKernel\Event\KernelEvent $event)```

You can fix it with changing the `pimcore/composer.json` file and require and older version of `sensio/framework-extra-bundle`

The require part should look like this:

```json
"require": {
    "php": ">=7.2",
    "wikimedia/composer-merge-plugin": "^1.4",
    "pimcore/pimcore": "~6.0.0",
    "sensio/framework-extra-bundle": "5.3.1"
  },

```

Then run `composer update` and the `pimcore-install` script again. 
