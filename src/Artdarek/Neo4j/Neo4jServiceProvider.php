<?php namespace Artdarek\Neo4j;

use Illuminate\Support\ServiceProvider;
use Illuminate\Foundation\AliasLoader;
use \Config;
use Everyman\Neo4j\Client;

class Neo4jServiceProvider extends ServiceProvider {

	/**
	 * Indicates if loading of the provider is deferred.
	 *
	 * @var bool
	 */
	protected $defer = false;

	/**
	 * Bootstrap the application events.
	 *
	 * @return void
	 */
	public function boot()
	{
		$this->package('artdarek/neo4j-4-laravel');
	}

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
	    // Register 'neo4j' instance container to our 'neo4j' object
		    $this->app['neo4j'] = $this->app->share(function($app)
		    {

		    	// connection credentials loaded from config
	                $host = Config::get('neo4j-4-laravel::host');
	                $port = Config::get('neo4j-4-laravel::port');		
                	$username = Config::get('neo4j-4-laravel::username');				
	                $password = Config::get('neo4j-4-laravel::password');				

        		// create mew neo4j node
        			$neo4j = new Client($host,$port);
  					$neo4j->getTransport()->setAuth($username, $password);

        		// return pusher
		        	return $neo4j;

		    });


	    // Shortcut so developers don't need to add an Alias in app/config/app.php
		    $this->app->booting(function()
		    {
		        $loader = AliasLoader::getInstance();
		        $loader->alias('Neo4j', 'Artdarek\Neo4j\Facades\Neo4j');
		    });

	}

	/**
	 * Get the services provided by the provider.
	 *
	 * @return array
	 */
	public function provides()
	{
		return array();
	}

}