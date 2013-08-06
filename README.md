# Neo4j for Laravel 4 Service Provider

Neo4j-4-laravel is a simple Neo4j service provider for Laravel 4. It is based on [Neo4jPHP](https://github.com/jadell/neo4jphp) 
witch is a PHP library wrapping the Neo4j graph database. The goal of Neo4jPHP is to provide you with access to all the functionality 
of the Neo4j REST API via PHP. The goal of Neo4j-4-laravel is to ensure you Neo4jPHP easy integration with Laravel 4.

---

- [Installation](#installation)
- [Registering the Package](#registering-the-package)
- [Configuration](#Configuration)
- [Usage](#usage)
- [More usage examples](#more-usage-examples)

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
	'host' => 	'localhost',
	'port' => 7474, 

	/**
	 * Credentials
	 */
	'username' => null,
	'password' => null 

);
```

## Usage

Nodes are the first of the two major entity types in a graph database. 
A node is a collection of zero or more key-value pairs. 
Neo4jPHP makes it very easy to create and work with nodes.

### Creating new node

The following code snippet creates some nodes, sets some properties on each, and saves the nodes to the server. 

```php

$arthur = Neo4j::makeNode();
$arthur->setProperty('name', 'Arthur Dent')
    ->setProperty('mood', 'nervous')
    ->setProperty('home', 'small cottage')
    ->save();

$ford = Neo4j::makeNode();
$ford->setProperty('name', 'Ford Prefect')
    ->setProperty('occupation', 'travel writer')
    ->save();

$arthurId = $arthur->getId();

```

### Retrieve a Node by ID and Update

Now that the node has been created, the node's id can be used to retrieve the node from the server later.
The following code retrieves the node and prints its properties:

```php

$character = Neo4j::getNode($arthurId);

foreach ($character->getProperties() as $key => $value) {
    echo "$key: $value\n";
}

// prints:
// name: Arthur Dent
// mood: nervous
// home: small cottage

$character->removeProperty('mood')
    ->setProperty('home', 'demolished')
    ->save();

foreach ($character->getProperties() as $key => $value) {
    echo "$key: $value\n";
}

// prints:
// name: Arthur Dent
// home: demolished

```

### Delete a Node

A node can be deleted as long as its ID has been set. 
Also note that a node cannot be deleted if it is the start or end point of any relationship.

```php

$earth = Neo4j::getNode(123);
$earth->delete();

```

### More usage examples

Go to [Neo4jPHP Wiki](https://github.com/jadell/neo4jphp/wiki) to find more usage examples.
