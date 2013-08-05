<?php namespace Artdarek\Neo4j\Facades;

use Illuminate\Support\Facades\Facade;

class Neo4j extends Facade {

    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor() { return 'neo4j'; }

}