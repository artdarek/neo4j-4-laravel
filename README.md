# Neo4j for Laravel 4 Service Provider

Neo4j-4-laravel is a simple Neo4j service provider for Laravel 4. 

---

- [Installation](#installation)
- [Registering the Package](#registering-the-package)
- [Configuration](#Configuration)
- [Usage](#usage)

## Installation

Add neo4j-4-laravel to your composer.json file:

```
"require": {
	"artdarek/neo4j-4-laravel": "dev-master"
}
```

Use [composer](http://getcomposer.org) to install this package.

```
$ composer update
```

### Registering the Package

Add the Neo4j-4-laravel Service Provider to your config in ``app/config/app.php``:

```php
'providers' => array(
	'Artdarek\Neo4j\Neo4jServiceProvider'
),
```

### Configuration

Run on the command line from the root of your project:

```
$ php artisan config:publish artdarek/neo4j-4-laravel
```

Set your neo4j-4-laravel credentials in ``app/config/packages/artdarek/neo4j-4-laravel/config.php``

```php
return array( 

	/*
	|--------------------------------------------------------------------------
	| Neo4j Config
	|--------------------------------------------------------------------------
	*/

	/**
	 * Host
	 */
	'scheme' => 'http', 
	'host' => 	'localhost',

	/**
	 * Credentials
	 */
	'username' => null,
	'password' => null 

);
```

### Usage

```php
/**
 * Add node
 *
 * @return Void
 */
public function index() {

    // create mew neo4j node
    $node = Neo4j::makeNode();
    $node->setProperty( 'type', 'some type' )
         ->setProperty( 'id', 12345 )
         ->save();

}
```
